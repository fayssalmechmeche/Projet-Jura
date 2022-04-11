<?php

namespace App\Controllers;

use \Core\View;
use App\Models\ConnexionModel;
use App\Models\DatabaseModel;
use App\Models\ReservationModel;
use App\Models\TypeHebergement;

class DashboardAdmin extends BaseController
{
    public function index()
    {
        $this->modalReservations = new TypeHebergement();
        $this->modalClient = new DatabaseModel();
        $data = [
            'hebergements' => $this->modalReservations->paginate(),
            'clients' => $this->modalClient->paginate(),

        ];
        $session = session();
        return view('admin',$data);
        
    }
    public function AfficherReservation()
    {
        $this->modalType = new TypeHebergement();
        $this->modalClient = new DatabaseModel();
        $this->modalReservation = new ReservationModel();
        $data = [
            'nbPersonnes' => $this->modalReservation->paginate(),
            'clients' => $this->modalClient->paginate(),
            'hebergements' => $this->modalType->paginate(),
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
    public function save(){
        $this->modalClients = new DatabaseModel();
        $this->modalType = new TypeHebergement();
        $data = [
            
            'libelle'    => $this->request->getVar('libelle'),
            'descriptionHebergement'    => $this->request->getVar('descriptionHebergement'),
            'batiment'    => $this->request->getVar('batiment'),
            'image'    => $this->request->getVar('image'),
        ];
          
        $this->modalType->save($data);
        return redirect()->to('/dashboardAdmin/reservation');

    }
    public function deleteHeber(){
        $this->modalType = new TypeHebergement();
        
            
            
        $id = $this->request->getVar('idHebergement');    
        
        $this->modalType->where('idHebergement',$id)->delete($id);
        return redirect()->to('/dashboardAdmin/');
    }
    public function updateHeber(){
        $this->modalType = new TypeHebergement();
        $data = [
            
            'libelle'    => $this->request->getVar('libelle'),
            'descriptionHebergement'    => $this->request->getVar('descriptionHebergement'),
            'batiment'    => $this->request->getVar('batiment'),
            'image'    => $this->request->getVar('image'),
        ];
        $id = $this->request->getVar('idHebergement');  
        $this->modalType->update($id,$data);
        return redirect()->to('/dashboardAdmin/');

    }

}
