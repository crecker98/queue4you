<?php

namespace App\Models;

use CodeIgniter\Model;

class Localita extends Model
{

    protected $table = "localita";
    protected $primaryKey = 'codice';
    protected $returnType = 'object';

}