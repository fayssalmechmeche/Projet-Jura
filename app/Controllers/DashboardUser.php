<?php

namespace App\Controllers;

use \Core\View;
use App\Models\ConnexionModel;

class DashboardUser extends BaseController
{
    public function index()
    {
        $session = session();
        return view('user');
    }
    public function reservation(){
        return view('reservations');
    }
}
