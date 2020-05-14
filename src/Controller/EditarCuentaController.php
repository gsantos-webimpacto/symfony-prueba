<?php
// src/Controller/EditarCuentaController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
class EditarCuentaController extends AbstractController
{
    /** 
    * @Route("/mi-cuenta") 
    */ 
    public function edit()
    {
        //$mensaje = 'Hello World!';
        $user = $this->get('security.token_storage')->getToken()->getUser();
        return $this->render('usuario/mi-cuenta.html.twig');
    }
    /** 
    * @Route("/mi-cuenta/editarCuenta") 
    */ 
    public function editar(){

        $entityManager = $this->getDoctrine()->getManager();

        $user = $this->get('security.token_storage')->getToken()->getUser();
        dump($user);
        dump("Llega a editar en el controller");
        $user->setNombre($_REQUEST["nombre"]);
        $user->setApellidos($_REQUEST["apellidos"]);
        $user->setUsername($_REQUEST["email"]);
        //$user->setPassword($_REQUEST["password"]);
        //$user->setFechadenacimiento($_REQUEST["fechaNacimiento"]);
        dump($_REQUEST["fechaNacimiento"]);
        // dump($user->getFechadenacimiento());
        $user->setSexo($_REQUEST["sexo"]);
        $user->setTelefono($_REQUEST["telefono"]);
        $user->setDatosadicionales($_REQUEST["datosAdicionales"]);
        $user->setCiudad($_REQUEST["ciudad"]);
        dump($_REQUEST["direccion"]);
        $user->setDireccion($_REQUEST["direccion"]);
        $user->setCodigopostal($_REQUEST["codigoPostal"]);
        dump($user);
        
        $entityManager->flush();
        return $this->render('usuario/mi-cuenta.html.twig');
    }
}