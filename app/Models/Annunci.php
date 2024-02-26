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

}