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
        // $entityManager = $this->getDoctrine()->getManager();
        
        dump("LLega a registrar");
        dump($_REQUEST);
        dump($_REQUEST["nombre"]);
        // dump($_REQUEST[nombre]);
        $manager = $this->getDoctrine()->getRepository(Pais::class);
        // $pais=new Pais();
        $pais=$manager->find($_REQUEST["pais"]);

        $manager = $this->getDoctrine()->getRepository(Idioma::class);
        $idioma=$manager->find($_REQUEST["idioma"]);
        dump($idioma);

        $manager = $this->getDoctrine()->getRepository(Provincia::class);
        $provincia=$manager->find($_REQUEST["provincia"]);

        $manager = $this->getDoctrine()->getRepository(User::class);
        // dump($pais);
        $user = new User();
        $user->setNombre($_REQUEST["nombre"]);
        $user->setApellidos($_REQUEST["apellidos"]);
        $user->setUsername($_REQUEST["email"]); 
        // $user->setFechadenacimiento($_REQUEST["fechaNacimiento"]);
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
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$STdSdEhjYWp5M1BsTUdPTg$c5S6BGv/sdbTuCAA13IIpev8k3LnbBB6smOmsiFOhF4');
        dump($user);
        // $manager->persist($user);
        // $manager->flush();
        return $this->render('Registro/register.html.twig');
    }
    
}