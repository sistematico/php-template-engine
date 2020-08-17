<?php

namespace App\Controller;
use App\Model\Frete;

class PaginasController
{
    public function index()
    {
        $Frete = new Frete();
        $fretes = $Frete->listar();
        $contagem = $Frete->contagem();
        require APP . 'View/_templates/header.php';
        require APP . 'View/paginas/index.php';
        require APP . 'View/_templates/footer.php';
    }
    
    public function busca()
    {
        require APP . 'View/_templates/header.php';
        require APP . 'View/paginas/busca.php';
        require APP . 'View/_templates/footer.php';
    }

    public function erro()
    {
        require APP . 'View/_templates/header.php';
        require APP . 'View/paginas/erro.php';
        require APP . 'View/_templates/footer.php';
    }
}
