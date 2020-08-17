<?php

namespace App\Controller;
use App\Model\Template;

class TemplatesController
{
    public function index()
    {
        echo Template::render(TEMPLATES . 'index.html', ['nome'=>'Site']);
    }

    public function erro()
    {
        echo Template::render(TEMPLATES . 'erro.html', ['nome'=>'Site']);
    }
}
