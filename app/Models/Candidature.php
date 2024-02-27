<?php

namespace App\Models;

use CodeIgniter\Model;

class Candidature extends Model
{

    protected $table = "candidature";
    protected $primaryKey = 'codice';
    protected $returnType = 'object';
    protected $allowedFields = ['codice', 'annuncio', 'utentecommissionatario', 'orainizioattivita', 'orafineattivita', 'stato'];

    public function getAllCandidatureForAnnuncio($codiceAnnuncio): array
    {
        $candidati = $this->db->query("select codicefiscale, nome, cognome from candidature, utenti where utenti.codicefiscale = candidature.utentecommissionatario and candidature.annuncio = $codiceAnnuncio")->getResultObject();
        foreach ($candidati as $candidato) {
            $candidato->mediaVal = $this->db->query("select avg(valutazione) mediaval from recensioni where utenterecensito = '$candidato->codicefiscale' group by utenterecensito")->getRowObject()->mediaval;
        }

        return $candidati;
    }

    public function scegliCandidato($codiceAnnuncio, $candidato)
    {
        $this->db->query("update candidature set stato = 1 where annuncio = $codiceAnnuncio and utentecommissionatario = '$candidato'");
        $this->db->query("update candidature set stato = 2 where annuncio = $codiceAnnuncio and utentecommissionatario != '$candidato'");
    }

    public function getAllCommissioni($codiceFiscale): array
    {
        return $this->db->query("select *, candidature.stato sCand from annunci, candidature, utenti where utenti.codicefiscale = annunci.utentecommissionante and annunci.codice = candidature.annuncio and candidature.utentecommissionatario = '$codiceFiscale'")->getResultObject();
    }

}