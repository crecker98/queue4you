<?php

namespace App\Controllers;

use App\Models\Localita;
use App\Models\Utenti;
use Config\Services;

class Signup extends BaseController
{
    public function index($data = array()): string
    {
        $localita = new Localita();
        $data['localita'] = $localita->findAll();

        $content = view("header");
        $content .= view('signup', $data);
        $content .= view("footer");
        return $content;
    }

    /**
     * @throws \ReflectionException
     */
    public function insertUtente(): string
    {
        $registrationRules = [
            'nome' => 'required|min_length[3]|max_length[20]',
            'cognome' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email',
            'password' => 'required',
            'localitacompetenza' => 'required',
            'telefono' => 'required|numeric|exact_length[10]',
            'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]',
            'password_repeat' => 'required|matches[password]'
        ];
        $validation = Services::validation();
        $validation->setRules($registrationRules);
        if ($validation->run($this->request->getPost())) {
            $file = $this->request->getFile('foto');
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $utente = $this->request->getPost();
            $utente['foto'] = $newName;
            $utente['password'] = hash("sha256", ($this->request->getPost('password')));
            $utenti = new Utenti();
            try {
                $utenti->insert($utente);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }

            $data['messaggio'] = "Utente inserito correttamente";
        } else {
            $data['errori'] = $validation->getErrors();
        }

        return $this->index($data);

    }

}