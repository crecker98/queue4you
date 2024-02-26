<?php

namespace App\Controllers;

use App\Models\Annunci;

class Home extends BaseController
{
    public function index(): string
    {
        $header = new Header();
        $content = $header->index();
        $annunci = new Annunci();
        $data['annunci'] = $annunci->getLast3Annunci();
        $content .= view('home', $data);
        $content .= view("footer");
        return $content;
    }
}
