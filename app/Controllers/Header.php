<?php

namespace App\Controllers;

use App\Models\Utenti;

class Header extends BaseController
{
    public function index(): string
    {
        helper('cookie');
        if (get_cookie('cod_user')) {
            $utenti = new Utenti();
            $data['utente'] = $utenti->find(get_cookie('cod_user'));
        } else {
            $data['utente'] = null;
        }
        return view("header", $data);
    }

    public function admin(): string
    {
        return view("admin/header");
    }

}