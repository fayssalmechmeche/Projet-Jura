<?php

namespace App\Controllers;

use \Core\View;
use App\Models\ConnexionModel;
use App\Models\ReservationModel;
use App\Models\DatabaseModel;

class DashboardAdmin extends BaseController
{
    public function index()
    {
        $session = session();
        return view('admin');
        
    }
    public function AfficherReservation()
    {
        $this->modalService = new ReservationModel();
        $data = [
            'nbPersonnes' => $this->modalService->paginate(),
        ];
        return view('/reservation',$data);
    }
    public function users(){
        $this->modalClients = new DatabaseModel();
        $data = [
            'clients' => $this->modalClients->paginate(),
            
        ];
        return view('/users',$data);

    }
    public function update(){
        $this->modalClients = new DatabaseModel();
        $data = [
            
            'mail'    => $this->request->getVar('mail'),
            'nomClient'    => $this->request->getVar('nom'),
            'prenomClient'    => $this->request->getVar('prenom'),
            
        ];
        $id = $this->request->getVar('id');  
        $this->modalClients->update($id,$data);
        return redirect()->to('/dashboardAdmin/users');

    }

    public function delete(){
        $this->modalClients = new DatabaseModel();
        
            
            
        $id = $this->request->getVar('id');    
        
        $this->modalClients->where('idClient',$id)->delete($id);
        return redirect()->to('/dashboardAdmin/users');

    }
}
