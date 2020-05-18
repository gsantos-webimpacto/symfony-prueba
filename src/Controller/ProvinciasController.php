<?php
// src/Controller/ProvinciasController.php
namespace App\Controller;
use App\Entity\Provincia;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
class ProvinciasController
{
    /**
     * @Route("/findProvinciasByPais{idpais}", name="app_find_provincias")
     */
    public function findProvinciasByPais($idpais)
    {
        //$provincias = $this->getDoctrine()->getRepository(Provincia::class)->findByPais(idpais);
        //dump($provincias);
        return new Response($provincias);
        //return $provincias;

    }
}
?>