<?php

namespace App\Controllers;

use App\Models\Candidature;
use App\Models\Segnalazioni;
use App\Models\Utenti;

class Admin extends BaseController
{

    public function index(): string
    {
        $header = new Header();
        $content = $header->admin();
        $data['utenti'] = count((new Utenti())->findAll());
        $data['segnalazioniAperte'] = count((new Segnalazioni())->findAll());
        $data['attivitaInCorso'] = count((new Candidature())->where('stato', 3)->findAll());
        $data['attivitaCompletate'] = count((new Candidature())->where('stato', 4)->findAll());
        $content .= view('/admin/home', $data);
        $content .= view("/admin/footer");
        return $content;
    }

    public function utenti($data = array()): string
    {
        $utenti = new Utenti();
        $data['utenti'] = $utenti->findAll();

        $header = new Header();
        $content = $header->admin();
        $content .= view('/admin/utenti', $data);
        $content .= view("/admin/footer");
        return $content;
    }

    public function attivaUtente($codicefiscale): string
    {
        $utenti = new Utenti();
        $utente = $utenti->find($codicefiscale);
        $utente->stato = 1;
        $utenti->save($utente);
        $data['messaggio'] = "Utente attivato correttamente";
        return $this->utenti($data);
    }

    public function bannaUtente($codicefiscale): string
    {
        $utenti = new Utenti();
        $utente = $utenti->find($codicefiscale);
        $utente->stato = 0;
        $utenti->save($utente);
        $data['messaggio'] = "Utente bannato correttamente";
        return $this->utenti($data);
    }

    public function segnalazioni(): string
    {
        $segnalazioni = new Segnalazioni();
        $data['segnalazioni'] = $segnalazioni->getAllInfoSegnalazioni();

        $header = new Header();
        $content = $header->admin();
        $content .= view('/admin/segnalazioni', $data);
        $content .= view("/admin/footer");
        return $content;
    }

}