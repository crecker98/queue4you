<?php

namespace App\Models;

use CodeIgniter\Model;

class Pagamenti extends Model
{

    protected $table = "pagamenti";
    protected $primaryKey = 'codice';
    protected $returnType = 'object';
    protected $allowedFields = ['codice', 'annuncio', 'importo', 'datapagamento'];

}