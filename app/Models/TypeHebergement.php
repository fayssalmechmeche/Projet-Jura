<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;
use PDOException;

class DatabaseModel extends Model
{

    protected $table = 'TypeHebergement';
    protected $allowedFields = ['libelle', 'descriptionHebergement', 'batiment'];
}
