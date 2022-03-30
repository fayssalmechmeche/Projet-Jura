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
        return view('reservation',$data);
    }
    public function users(){
        $this->modalClients = new DatabaseModel();
        $data = [
            'clients' => $this->modalClients->paginate(),
            
        ];
        return view('users',$data);

    }
    public function update(){

        $data = [
            'identifiant'     => $this->request->getVar('name'),
            'mail'    => $this->request->getVar('mail'),
            'nomClient'    => $this->request->getVar('nom'),
            'prenomClient'    => $this->request->getVar('prenom'),
            'mdp' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            'Admin' =>0
        ];
    }

    public function delete(){

        $data = [
            'identifiant'     => $this->request->getVar('name'),
            'mail'    => $this->request->getVar('mail'),
            'nomClient'    => $this->request->getVar('nom'),
            'prenomClient'    => $this->request->getVar('prenom'),
            'mdp' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            'idClient' => 
        ];
    }
}
