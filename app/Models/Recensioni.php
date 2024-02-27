<?php

namespace App\Models;

use CodeIgniter\Model;

class Recensioni extends Model
{

    protected $table = "recensioni";
    protected $primaryKey = 'codice';
    protected $returnType = 'object';
    protected $allowedFields = ['codice', 'utenterecensito', 'utenterecensente', 'valutazione', 'commento', 'data', 'annuncio'];

    public function getValutazioneMedia($codiceFiscale): float
    {
        $builder = $this->builder();
        $builder->select('AVG(valutazione) as valutazione_media');
        $builder->where('utenterecensito', $codiceFiscale);
        $query = $builder->get();
        $row = $query->getRow();
        return $row->valutazione_media;
    }

}