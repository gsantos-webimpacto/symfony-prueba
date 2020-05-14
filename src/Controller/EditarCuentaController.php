<?php
// src/Controller/EditarCuentaController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class EditarCuentaController extends AbstractController
{
    /** 
    * @Route("/mi-cuenta") 
    */ 
    public function edit()
    {
        //$mensaje = 'Hello World!';

        return $this->render('usuario/mi-cuenta.html.twig');
        // return new Response(
        //     '<html><body><h1>Hello World!</h1></body></html>'
        // );
    }
}