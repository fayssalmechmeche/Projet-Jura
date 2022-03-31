<?php

namespace App\Controllers;

use \Core\View;
use App\Models\DatabaseModel;
use App\Models\ReservationModel;
use App\Models\TypeHebergement;

class DashboardUser extends BaseController
{
    public function index()
    {

        $session = session();
        return view('user');
    }
    public function reservation()
    {
        $this->modalReservations = new TypeHebergement();
        $this->modalClient = new DatabaseModel();
        $data = [
            'hebergements' => $this->modalReservations->paginate(),
            'clients' => $this->modalClient->paginate(),

        ];
        return view('reservations', $data);
    }
    public function save()
    {
        $this->modalType = new TypeHebergement();
        $this->modalClient = new DatabaseModel();
        $this->modalReservation = new ReservationModel();
        $condition = $this->request->getVar('nbPersonne');


        if ($condition == 'Oui') {
            $pension = 1;
        } else {
            $pension = 0;
        }

        $data = [

            'mail'    => $this->request->getVar('mail'),

            'dateDepart'    => $this->request->getVar('datedepart'),
            'dateArrivee'    => $this->request->getVar('datearrive'),
            'nbPersonne'   => $this->request->getVar('nbPersonne'),
            'idClient'   => $this->request->getVar('idClient'),
            'idHebergement'   => $this->request->getVar('idHebergement'),
            'pension'    => $pension

        ];

        $this->modalReservation->save($data);
        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Reservation effectuée');
        return redirect()->to(route_to('reservation'));
    }
}
