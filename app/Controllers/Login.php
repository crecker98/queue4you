<?php

namespace App\Controllers;

use App\Models\Utenti;

class Login extends BaseController
{

    public function index($data = array()): string
    {
        $header = new Header();
        $content = $header->index();
        $content .= view('login', $data);
        $content .= view("footer");
        return $content;
    }

    public function resetPassword(): string
    {
        $utenti = new Utenti();
        $conditions = array('email' => $this->request->getPost('email'), "stato" => 1);
        $utente = $utenti->where($conditions)->first();
        if ($utente) {
            $utente->password = hash("sha256", "password");
            $data['reset'] = 1;
            $utenti->save($utente);
        } else {
            $data['erroriReset'] = "Email non trovata";
        }
        return $this->index($data);
    }

    public function login()
    {
        $utenti = new Utenti();
        $conditions = array('email' => $this->request->getPost('email'), 'password' => hash('sha256', $this->request->getPost('password')), "stato" => 1);
        $utente = $utenti->where($conditions)->first();
        if ($utente) {
            $session = session();
            $session->set('utente', $utente);
            $this->response->setCookie('cod_user', $utente->codicefiscale, (60 * 60 * 24 * 30));
            return redirect()->to(base_url())->withCookies();
        } else {
            $data['errori'] = "Email o password errati";
        }
        return $this->index($data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        $this->response->deleteCookie('cod_user');
        return redirect()->to(base_url())->withCookies();
    }

}