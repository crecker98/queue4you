<?php

namespace App\Models;

use CodeIgniter\Model;

class Preferiti extends Model
{

    protected $table = "preferiti";
    protected $primaryKey = 'codice';
    protected $returnType = 'object';
    protected $allowedFields = ['codice', 'utentepreferente', 'utentepreferito'];


}