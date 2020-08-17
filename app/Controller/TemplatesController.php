<?php

namespace App\Controller;
use App\Model\Template;

class TemplatesController
{
    public function index()
    {
        echo Template::render('index', ['nome'=>'Site']);
    }

    public function erro()
    {
        echo Template::render('erro', ['nome'=>'Site']);
    }
}
