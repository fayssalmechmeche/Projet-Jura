<?php

namespace App\Controllers;

use \Core\View;
use App\Models\DatabaseModel;

class Inscription extends BaseController
{
    
    public function index()
    {
        
        helper(['form']);
        return view('inscription');
    }
    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'nom'          => 'required|min_length[3]|max_length[20]',
            'prenom'          => 'required|min_length[3]|max_length[20]',
            'mail'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[Client.mail]',
            'pass'      => 'required|min_length[6]|max_length[200]',
            'cpass'  => 'matches[pass]'
        ];
          
        if($this->validate($rules)){
            $model = new DatabaseModel();
            $data = [
                'identifiant'     => $this->request->getVar('name'),
                'mail'    => $this->request->getVar('mail'),
                'nomClient'    => $this->request->getVar('nom'),
                'prenomClient'    => $this->request->getVar('prenom'),
                'mdp' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'Admin' =>0
            ];

            $model->save($data);
            return redirect()->to('/connexion');
        }else{
            $data['validation'] = $this->validator;
            return view('inscription', $data);
        }
          
    }

    
  
    
    
    
}