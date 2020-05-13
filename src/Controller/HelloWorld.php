<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class HelloWorld extends AbstractController
{
    /** 
    * @Route("/register") 
    */ 
    public function hello()
    {
        //$mensaje = 'Hello World!';

        return $this->render('Registro/register.html.twig');
        // return new Response(
        //     '<html><body><h1>Hello World!</h1></body></html>'
        // );
    }
}