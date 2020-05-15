<?php
// src/Controller/ProvinciaController.php
namespace App\Controller;
use App\Entity\Provincia;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
class ProvinciaController
{
    /**
     * @Route("/findProvinciasByPais{idpais}", name="app_find_provincias")
     */
    //funcion que llama a la query del repositorio Provincia y encuentra las provincias del pais
    public function findProvinciasByPais($idpais)
    {
        $provincias = $this->getDoctrine()->getRepository(Provincia::class)->findByPais(idpais);
        dump($provincias);
        // return new Response($provincias);
        return $provincias;

    }
}
?>