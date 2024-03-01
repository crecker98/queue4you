<?php

namespace App\Controllers;

use App\Models\Annunci;
use App\Models\Candidature;
use App\Models\Localita;
use App\Models\Pagamenti;
use App\Models\Preferiti;
use App\Models\Recensioni;
use App\Models\Segnalazioni;
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
        $data['annunci'] = (new Annunci())->getListaAnnunciForUtente($this->request->getCookie('cod_user'));
        $data['commissioni'] = (new Candidature())->getAllCommissioni($this->request->getCookie('cod_user'));
        $content .= view('areaRiservata', $data);
        $content .= view("footer");
        return $content;
    }

    /**
     * @throws \ReflectionException
     */
    public function pagaAttivita($codAnnuncio, $codCand): string
    {
        $annuncio = (new Annunci())->find($codAnnuncio);
        $candidature = (new Candidature())->find($codCand);
        $pagamenti = new Pagamenti();
        $pagamento = [
            'utentepagante' => $this->request->getCookie('cod_user'),
            'utenteesecutore' => $candidature->utentecommissionatario,
            'annuncio' => $annuncio->codice,
            'importo' => $annuncio->prezzominuto * ((strtotime($candidature->orafineattivita) - strtotime($candidature->orainizioattivita)) / 60),
            'datapagamento' => date('Y-m-d H:i:s')
        ];
        $pagamenti->insert($pagamento);
        $candidature->stato = 5;
        (new Candidature())->save($candidature);
        $utente = (new Utenti())->find($candidature->utentecommissionatario);
        $utente->wallet += $this->request->getPost('importo');
        (new Utenti())->save($utente);
        $commissionante = (new Utenti())->find($this->request->getCookie('cod_user'));
        $commissionante->wallet -= $this->request->getPost('importo');
        (new Utenti())->save($commissionante);
        $data['messaggio'] = "Pagamento effettuato correttamente";
        return $this->index($data);
    }

    public function iniziaAttivita($codice): string
    {
        $candidature = new Candidature();
        $candidatura = $candidature->find($codice);
        $candidatura->orainizioattivita = date('Y-m-d H:i:s');
        $candidatura->stato = 3;
        $candidature->save($candidatura);
        $data['messaggio'] = "Attività iniziata correttamente";
        return $this->index($data);
    }

    public function terminaAttivita($codice): string
    {
        $candidature = new Candidature();
        $candidatura = $candidature->find($codice);
        $candidatura->orafineattivita = date('Y-m-d H:i:s');
        $candidatura->stato = 4;
        $candidature->save($candidatura);
        $data['messaggio'] = "Attività terminata correttamente";
        return $this->index($data);
    }

    public function eliminaCommissione($codice): string
    {
        $candidature = new Candidature();
        $candidature->delete($codice);
        $data['messaggio'] = "Commissione eliminata correttamente";
        return $this->index($data);
    }

    public function recensisci($annuncio, $esecutore): string
    {
        $recensioni = new Recensioni();
        $recensione = [
            'utenterecensito' => $esecutore,
            'utenterecensente' => $this->request->getCookie('cod_user'),
            'valutazione' => $this->request->getPost('valutazione'),
            'commento' => $this->request->getPost('commento'),
            'data' => date('Y-m-d H:i:s'),
            'annuncio' => $annuncio
        ];
        $recensioni->insert($recensione);
        $data['messaggio'] = "Recensione inserita correttamente";
        return $this->index($data);
    }

    public function aggiungiPreferito($utentePreferito): string
    {
        $preferiti = new Preferiti();
        $preferito = [
            'utentepreferente' => $this->request->getCookie('cod_user'),
            'utentepreferito' => $utentePreferito
        ];
        $preferiti->insert($preferito);
        $data['messaggio'] = "Utente aggiunto ai preferiti correttamente";
        return $this->index($data);
    }

    public function segnala($annuncio, $codiceFiscale): string
    {
        $segnalazioni = new Segnalazioni();
        $segnalazione = [
            'utentechesegnala' => $this->request->getCookie('cod_user'),
            'utentesegnalato' => $codiceFiscale,
            'messaggio' => $this->request->getPost('messaggio'),
            'data' => date('Y-m-d H:i:s'),
            'annuncio' => $annuncio
        ];
        $segnalazioni->insert($segnalazione);
        $data['messaggio'] = "Utente segnalato correttamente";
        return $this->index($data);
    }

    public function scegliCandidato($codiceAnnuncio, $candidato): string
    {
        $candidature = new Candidature();
        $candidature->scegliCandidato($codiceAnnuncio, $candidato);
        $data['messaggio'] = "Candidato scelto correttamente";
        return $this->index($data);
    }

    public function eliminaAnnuncio($codiceAnnuncio): string
    {
        $annunci = new Annunci();
        $annunci->delete($codiceAnnuncio);
        $data['messaggio'] = "Annuncio cancellato correttamente";
        return $this->index($data);
    }

    public function aggiornaProfilo(): string
    {

        $updateRules = [
            'nome' => 'required|min_length[3]|max_length[20]',
            'cognome' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email|is_unique[utenti.email,utenti.codicefiscale,' . $this->request->getPost('codicefiscale') . ']',
            'localitacompetenza' => 'required',
            'telefono' => 'required|exact_length[10]',
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