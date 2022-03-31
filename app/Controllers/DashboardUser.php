<?php

namespace App\Controllers;

use \Core\View;
use App\Models\ConnexionModel;
use App\Models\TypeHebergement;

class DashboardUser extends BaseController
{
    public function index()
    {
        $session = session();
        return view('user');
    }
    public function reservation(){
        $this->modalReservations = new TypeHebergement();
        $data = [
            'hebergements' => $this->modalReservations->paginate(),
            
        ];
        return view('reservations',$data);
    }
}
