<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;
use PDOException;

class TypeHebergement extends Model
{

    protected $table = 'typeHebergement';
    protected $allowedFields = ['libelle', 'descriptionHebergement', 'batiment', 'idHebergement', 'idClient','image'];
}
