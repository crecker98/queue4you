<?php

namespace App\Controllers;

use App\Models\Annunci;
use App\Models\Localita;
use App\Models\Utenti;
use Config\Services;

class Profilo extends BaseController
{

    public function index($data = array()): string
    {
        $header = new Header();
        $content = $header->index();
        $localita = new Localita();
        $data['localita'] = $localita->findAll();
        $data['annunci'] = (new Annunci())->where('utentecommissionante', $this->request->getCookie('cod_user'))->findAll();
        $content .= view('areaRiservata', $data);
        $content .= view("footer");
        return $content;
    }

    public function aggiornaProfilo(): string
    {

        $updateRules = [
            'nome' => 'required|min_length[3]|max_length[20]',
            'cognome' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email|is_unique[utenti.email,utenti.codicefiscale,' . $this->request->getPost('codicefiscale') . ']',
            'localitacompetenza' => 'required',
            'telefono' => 'required|numeric|exact_length[10]',
            'foto' => 'permit_empty|uploaded[foto]|max_size[foto,1024]|is_image[foto]',
        ];

        $validation = Services::validation();
        $validation->setRules($updateRules);
        if ($validation->run($this->request->getPost())) {
            $utente = $this->request->getPost();
            if (!is_null($this->request->getFile('foto')) && $this->request->getFile('foto')->isValid() && !$this->request->getFile('foto')->hasMoved()) {
                $file = $this->request->getFile('foto');
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . 'public/uploads', $newName);
                $utente['foto'] = $newName;
            }
            if ($this->request->getPost('password') != "") {
                $utente['password'] = hash("sha256", ($this->request->getPost('password')));
            }
            $utenti = new Utenti();
            try {
                $utenti->save($utente);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
            $data['messaggio'] = "Informazioni aggiornate correttamente";
        } else {
            $data['errori'] = $validation->getErrors();
        }

        return $this->index($data);
    }

    public function ricaricaWallet(): string
    {

        $rulesRicarica = [
            'importo' => 'required|numeric'
        ];
        $validation = Services::validation();
        $validation->setRules($rulesRicarica);
        if ($validation->run($this->request->getPost())) {
            $utenti = new Utenti();
            $utente = $utenti->find($this->request->getCookie('cod_user'));
            $utente->wallet += $this->request->getPost('importo');
            $utenti->save($utente);
            $data['messaggio'] = "Wallet ricaricato correttamente";
        } else {
            $data['errori'] = $validation->getErrors();
        }

        return $this->index($data);
    }

    public function inserisciAnnuncio(): string
    {
        $rulesAnnuncio = [
            'oggetto' => 'required|min_length[3]|max_length[50]',
            'descrizione' => 'required|min_length[10]|max_length[500]',
            'localita' => 'required',
            'indirizzo' => 'required|min_length[3]|max_length[50]',
            'prezzominuto' => 'required|numeric'
        ];
        $validation = Services::validation();
        $validation->setRules($rulesAnnuncio);
        if ($validation->run($this->request->getPost())) {
            $annuncio = $this->request->getPost();
            $annuncio['utentecommissionante'] = $this->request->getCookie('cod_user');
            $annunci = new Annunci();
            try {
                $annunci->insert($annuncio);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
            $data['messaggio'] = "Annuncio inserito correttamente";
        } else {
            $data['errori'] = $validation->getErrors();
        }

        return $this->index($data);
    }

}