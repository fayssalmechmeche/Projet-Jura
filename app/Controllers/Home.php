<?php

namespace App\Controllers;

use \Core\View;
use App\Models\ConnexionModel;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }
}
