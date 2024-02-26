<?php

namespace App\Controllers;


use App\Models\Candidature;
use App\Models\Utenti;

class Annunci extends BaseController
{

    public function index($data = array()): string
    {
        $header = new Header();
        $content = $header->index();
        $annunci = new \App\Models\Annunci();
        if (!is_null($this->request->getCookie('cod_user'))) {
            $utente = new Utenti();
            $ut = $utente->find($this->request->getCookie('cod_user'));
            $data['annunci'] = $annunci->getAllAnnunciAttiviFiltrati($ut->localitacompetenza);
        } else {
            $data['annunci'] = $annunci->getAllAnnunciAttivi();
        }
        $content .= view('annunci', $data);
        $content .= view("footer");
        return $content;
    }

    public function filtraAnnunci(): string
    {
        $header = new Header();
        $content = $header->index();

        $annunci = new \App\Models\Annunci();
        if (!is_null($this->request->getCookie('cod_user'))) {
            $utente = new Utenti();
            $localita = $utente->find($this->request->getCookie('cod_user'))->localitacompetenza;
        }
        $data['filtri'] = $this->request->getPost();
        $data['annunci'] = $annunci->getAllAnnunciAttiviFiltrati($localita, $this->request->getPost('prezzoMinimo'), $this->request->getPost('dataInizio'), $this->request->getPost('dataFine'));

        $content .= view('annunci', $data);
        $content .= view("footer");
        return $content;
    }

    /**
     * @throws \ReflectionException
     */
    public function candidati($codiceAnnuncio)
    {
        if (!is_null($this->request->getCookie('cod_user'))) {
            $candidature = new Candidature();
            $condition = [
                'utentecommissionatario' => $this->request->getCookie('cod_user'),
                'annuncio' => $codiceAnnuncio
            ];
            $candidature->where($condition);
            if ($candidature->countAllResults() > 0) {
                $data['errori'] = "Ti sei già candidato per questo annuncio";
                return $this->index($data);
            }
            $candidature->insert([
                'utentecommissionatario' => $this->request->getCookie('cod_user'),
                'annuncio' => $codiceAnnuncio,
                'stato' => 0
            ]);
            return redirect()->to(base_url('areaRiservata'));
        } else {
            return $this->index();
        }

    }

}