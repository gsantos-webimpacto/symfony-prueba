<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Pais;
use App\Entity\Idioma;
use App\Entity\Provincia;
use Doctrine\Bundle\FixturesBundle\Fixture;
// use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
// use Symfony\Component\Security\Core\User\UserInterface;

class Register extends AbstractController
{

    /** 
    * @Route("/register") 
    */ 
    public function hello()
    {   
        return $this->render('Registro/register.html.twig');
    }
    /** 
    * @Route("/register/registrarusuario") 
    */ 
    public function registrar(EntityManagerInterface $manager)
    // public function registrar()
    {   
        $entityManager = $this->getDoctrine()->getManager();

        $manager = $this->getDoctrine()->getRepository(Pais::class);
        $pais=$manager->find($_REQUEST["pais"]);
        $manager = $this->getDoctrine()->getRepository(Idioma::class);
        $idioma=$manager->find($_REQUEST["idioma"]);
        dump($idioma);
        $manager = $this->getDoctrine()->getRepository(Provincia::class);
        $provincia=$manager->find($_REQUEST["provincia"]);
        
        
        $user = new User();
        $user->setNombre($_REQUEST["nombre"]);
        $user->setApellidos($_REQUEST["apellidos"]);
        $user->setUsername($_REQUEST["email"]); 
        $date = date_create_from_format('Y-m-d', $_REQUEST["fechaNacimiento"]);
        $user->setFechadenacimiento($date);
        $user->setSexo($_REQUEST["sexo"]);
        $user->setTelefono($_REQUEST["telefono"]);
        $user->setDatosadicionales($_REQUEST["datosAdicionales"]);
        $user->setIdioma($idioma);
        $user->setCiudad($_REQUEST["ciudad"]);
        $user->setDireccion($_REQUEST["direccion"]);
        $user->setCodigopostal($_REQUEST["codigoPostal"]);
        $user->setPais($pais);
        $user->setProvincia($provincia);
        $user->setRoles(['ROLE_USER']);
        $passwordForm = $_REQUEST["password"];
        if($passwordForm!=""){
            $password = $passwordEncoder->encodePassword($user,$passwordForm);
            $user->setPassword($password);
        }
        dump($user);
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->render('Registro/register.html.twig');
    }
    
}