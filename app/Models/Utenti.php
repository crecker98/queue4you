<?php

namespace App\Models;

use CodeIgniter\Model;

class Utenti extends Model
{

    protected $table = "utenti";
    protected $primaryKey = 'codicefiscale';
    protected $returnType = 'object';
    protected $allowedFields = ['codicefiscale', 'nome', 'cognome', 'email', 'password', 'wallet', 'email', 'telefono', 'foto', 'localitacompetenza', 'stato'];

    public function getAllEsecutori(): array
    {
        $esecutori = $this->where('stato', 1)->findAll();
        foreach ($esecutori as $esecutore) {
            $esecutore->valutazioneMedia = (new Recensioni())->getValutazioneMedia($esecutore->codicefiscale);
            $esecutore->recensioni = (new Recensioni())->where('utenterecensito', $esecutore->codicefiscale)->findAll();
        }

        return $esecutori;
    }

}