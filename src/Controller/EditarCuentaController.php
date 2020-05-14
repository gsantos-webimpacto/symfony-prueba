<?php
// src/Controller/EditarCuentaController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\DateTime;
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
    public function editar(UserPasswordEncoderInterface $passwordEncoder){
        
        //dump("Llega a editar en el controller"); 
        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $passwordForm = $_REQUEST["password"];
        if($passwordForm!=""){
            $password = $passwordEncoder->encodePassword($user,$passwordForm);
            $user->setPassword($password);
        }
        $user->setNombre($_REQUEST["nombre"]);
        $user->setApellidos($_REQUEST["apellidos"]);
        $user->setUsername($_REQUEST["email"]);
        //dump($_REQUEST["fechaNacimiento"]);
        $date = date_create_from_format('Y-m-d', $_REQUEST["fechaNacimiento"]);
        $user->setFechadenacimiento($date);
        //dump($user->getFechadenacimiento());
        $user->setSexo($_REQUEST["sexo"]);
        $user->setTelefono($_REQUEST["telefono"]);
        $user->setDatosadicionales($_REQUEST["datosAdicionales"]);
        $user->setCiudad($_REQUEST["ciudad"]);
        $user->setDireccion($_REQUEST["direccion"]);
        $user->setCodigopostal($_REQUEST["codigoPostal"]);
        //dump($user);
        $entityManager->flush();
        return $this->render('usuario/mi-cuenta.html.twig');
    }
}