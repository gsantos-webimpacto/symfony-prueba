<?php
// src/Controller/ProvinciasController.php
namespace App\Controller;
use App\Entity\Provincia;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
class ProvinciasController extends AbstractController
{
    /**
     * @Route("/findProvinciasByPais/{idpais}", name="app_find_provincias")
     */
    public function findProvinciasByPais($idpais)
    {
        dump("Holi");
        $provincias = $this->getDoctrine()->getRepository(Provincia::class)->findByPais($idpais);
        dump($provincias);
        $jsonData = array();  
        $idx = 0;  
        foreach($provincias as $provincia) {  
            $temp = array(
                'idprovincia' => $provincia->getIdprovincia(),  
                'nombre' => $provincia->getNombre(),  
            );   
            $jsonData[$idx++] = $temp;  
        } 
        dump($jsonData);
        return new JsonResponse($jsonData);

    }
}
?>