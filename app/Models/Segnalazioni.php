<?php

namespace App\Models;

use CodeIgniter\Model;

class Segnalazioni extends Model
{

    protected $table = "segnalazioni";
    protected $primaryKey = 'codice';
    protected $returnType = 'object';
    protected $allowedFields = ['codice', 'utentechesegnala', 'utentesegnalato', 'messaggio', 'data', 'annuncio'];

    public function getAllInfoSegnalazioni(): array
    {
        $query = "select * from segnalazioni, utenti, annunci where segnalazioni.annuncio = annunci.codice and utenti.codicefiscale = segnalazioni.utentesegnalato";
        $segnalazioni = $this->db->query($query)->getResultObject();
        foreach ($segnalazioni as $segnalazione) {
            $segnalazione->utenteCheSegnala = $this->db->query("select * from utenti where codicefiscale = '$segnalazione->utentechesegnala'")->getRowObject();
            $segnalazione->utenteSegnalato = $this->db->query("select * from utenti where codicefiscale = '$segnalazione->utentesegnalato'")->getRowObject();
        }

        return $segnalazioni;
    }

}