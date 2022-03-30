<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;
use PDOException;

class ReservationModel extends Model
{

    protected $table = 'Reservation';
    
    protected $allowedFields = ['dateArrivee', 'dateDepart', 'nbPersonne', 'pension', '', ''];
}
