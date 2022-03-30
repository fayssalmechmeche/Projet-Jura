<?php

namespace App\Controllers;

use \Core\View;
use App\Models\DatabaseModel;

class Connexion extends BaseController
{
    
    public function index()
    {
        
        helper(['form']);
        return view('connexion');
    }

    public function auth()
    {
        $session = session();
        $model = new DatabaseModel();
        $identifiant = $this->request->getVar('name');
        $password = $this->request->getVar('pass');
        
        $data = $model->where('identifiant', $identifiant)->first();
        if($data){
            $pass = $data['mdp'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'idClient'       => $data['idClient'],
                    'nomClient'     => $data['nomClient'],
                    'identifiant'    => $data['identifiant'],
                    'Admin'         => $data['Admin'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                if ($data['Admin']== 0){
                    
                    return redirect()->to('/dashboard');
                     
                }else{
                    return redirect()->to('dashboardAdmin/');
                }
                
            }else{
                $session->setFlashdata('msg', 'Mot de passe incorrect');
                return redirect()->to('/connexion');
            }
        }else{
            $session->setFlashdata('msg', 'identifiant non trouvé');
            return redirect()->to('connexion');
        }
    }
  
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/connexion');
    }

    
  
    
    
    
}