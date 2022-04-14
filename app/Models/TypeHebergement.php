<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;
use PDOException;

class TypeHebergement extends Model
{

    protected $table = 'typeHebergement';
    protected $primaryKey = 'idHebergement';
    protected $allowedFields = ['libelle', 'descriptionHebergement', 'batiment', 'idClient', 'image', 'prix'];
}
