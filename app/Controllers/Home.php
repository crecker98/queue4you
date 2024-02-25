<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $content = view("header");
        $content .= view('home');
        $content .= view("footer");
        return $content;
    }
}
