<?php

namespace App\Controllers;

use \Core\View;
use App\Models\DatabaseModel;
use App\Models\ReservationModel;
use App\Models\TypeHebergement;

class DashboardUser extends BaseController
{
    public function __construct()
    {
    }
    public function index()
    {
        $this->modal = new DatabaseModel();

        $session = \Config\Services::session();
        $id = $session->get('idClient');
        $data['logins'] = $this->modal->find($id);
        $data['validation'] = $this->validator;
        return view('user', $data);
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
    function update()
    {
        $this->modal = new DatabaseModel();

        helper(['form', 'url']);

        $rules = [
            'prenomClient'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez entrer un prenom valide.',
                ]
            ],
            'mail'          => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Veuillez entrer un e-mail valide.',
                    'valid_email' => 'Veuillez entrer un e-mail valide.',
                ]
            ],
            'mdp'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez entrer un mot de passe valide.',
                ]
            ],



        ];



        $id = $this->request->getVar('id');

        if ($this->validate($rules)) {

            $data = [
                'prenomClient' => $this->request->getVar('prenomClient'),
                'nomClient' => $this->request->getVar('nomClient'),
                'mail'  => $this->request->getVar('mail'),
                'adresse'  => $this->request->getVar('adresse'),
                'mdp'  => password_hash($this->request->getVar('mdp'), PASSWORD_DEFAULT)
            ];

            $this->modal->update($id, $data);

            $session = \Config\Services::session();



            return redirect()->to('dashboard');
        } else {
            $data['validation'] = $this->validator;

            return view('user', $data);
        }
    }
}
