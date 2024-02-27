<?php

namespace App\Models;

use CodeIgniter\Model;

class Annunci extends Model
{

    protected $table = "annunci";
    protected $primaryKey = 'codice';
    protected $returnType = 'object';
    protected $allowedFields = ['codice', 'oggetto', 'descrizione', 'prezzominuto', 'utentecommissionante', 'dataorainizionecessita', 'dataoramassimacompletamento', 'localita', 'indirizzo'];

    public function getLast3Annunci(): array
    {
        return $this->db->query('SELECT * FROM annunci where codice not in (select annuncio from candidature where stato = 1) ORDER BY dataorainizionecessita ASC LIMIT 3')->getResultObject();
    }

    public function getAllAnnunciAttivi(): array
    {
        return $this->db->query('SELECT *, localita.descrizione desc FROM annunci, localita where annunci.localita = localita.codice and annunci.codice in (select annuncio from candidature where stato = 0) and dataorainizionecessita >= now() ORDER BY dataorainizionecessita ASC')->getResultObject();
    }

    public function getAllAnnunciAttiviFiltrati($localita = null, $prezzoMinimo = null, $dataInizio = null, $dataFine = null): array
    {
        $query = "SELECT *, localita.descrizione desc FROM annunci, localita where annunci.localita = localita.codice and annunci.codice in (select distinct annuncio from candidature where stato = 0) and dataorainizionecessita >= now() ";
        if ($localita != null) {
            $query .= " and localita.codice = $localita";
        }
        if ($prezzoMinimo != null) {
            $query .= " and annunci.prezzominuto >= $prezzoMinimo";
        }
        if ($dataInizio != null) {
            $query .= " and DATE(annunci.dataorainizionecessita) >= '$dataInizio'";
        }
        if ($dataFine != null) {
            $query .= " and DATE(annunci.dataoramassimacompletamento) <= '$dataFine'";
        }
        $query .= " ORDER BY dataorainizionecessita ASC";
        return $this->db->query($query)->getResultObject();
    }

    public function getListaAnnunciForUtente($codicefiscale): array
    {
        $query = "select * from annunci where utentecommissionante = '$codicefiscale'";
        $annunci = $this->db->query($query)->getResultObject();
        foreach ($annunci as $annuncio) {
            $queryEsecutore = "select *, candidature.stato statoCandidature, candidature.codice codCand from candidature, utenti where utenti.codicefiscale = candidature.utentecommissionatario and annuncio = $annuncio->codice and candidature.stato = 1 or candidature.stato = 3 or candidature.stato = 4 or candidature.stato = 5";
            $annuncio->esecutore = $this->db->query($queryEsecutore)->getFirstRow();
            $annuncio->candidature = (new Candidature())->getAllCandidatureForAnnuncio($annuncio->codice);
            if ($annuncio->esecutore != null) {
                $annuncio->isPreferito = (new Preferiti())->where(['utentepreferito' => $annuncio->esecutore->codicefiscale])->first() != null;
                $annuncio->isRecensito = (new Recensioni())->where(['utenterecensito' => $annuncio->esecutore->codicefiscale, 'annuncio' => $annuncio->codice])->first() != null;
                $annuncio->isPagato = (new Pagamenti())->where(['annuncio' => $annuncio->codice])->first() != null;
                $annuncio->isSegnalato = (new Segnalazioni())->where(['utentesegnalato' => $annuncio->esecutore->codicefiscale, 'annuncio' => $annuncio->codice])->first() != null;
            }
        }

        return $annunci;
    }

}