<?php

namespace App\Controllers;

use App\Models\Utenti;

class Esecutori extends BaseController
{

    public function index(): string
    {
        $content = (new Header())->index();
        $data['esecutori'] = (new Utenti())->getAllEsecutori();
        $content .= view('esecutori', $data);
        $content .= view("footer");
        return $content;
    }

}