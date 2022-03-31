<?php

namespace App\Controllers;

use \Core\View;
use App\Models\DatabaseModel;
use App\Models\TypeHebergement;

class Home extends BaseController
{
    public function index()
    {
        $this->modalReservations = new TypeHebergement();
        $this->modalClient = new DatabaseModel();
        $data = [
            'hebergements' => $this->modalReservations->paginate(),
            'clients' => $this->modalClient->paginate(),

        ];
        return view('home', $data);
    }
}
