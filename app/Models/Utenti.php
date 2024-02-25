<?php

namespace App\Models;

use CodeIgniter\Model;

class Utenti extends Model
{

    protected $table = "utenti";
    protected $primaryKey = 'codicefiscale';
    protected $returnType = 'object';
    protected $allowedFields = ['codicefiscale', 'nome', 'cognome', 'email', 'password', 'wallet', 'email', 'telefono', 'foto', 'localitacompetenza', 'stato'];

}