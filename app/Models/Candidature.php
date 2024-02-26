<?php

namespace App\Models;

use CodeIgniter\Model;

class Candidature extends Model
{

    protected $table = "candidature";
    protected $primaryKey = 'codice';
    protected $returnType = 'object';
    protected $allowedFields = ['codice', 'annuncio', 'utentecommissionatario', 'orainizioattivita', 'orafineattivita', 'stato'];

}