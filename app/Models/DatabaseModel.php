<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;
use PDOException;

class DatabaseModel extends Model
{

        protected $table = 'Client';
        protected $primaryKey = 'idClient';
        protected $allowedFields = ['nbPersonne', 'nomClient', 'prenomClient', 'mail', 'mdp', 'admin'];
}
