<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idioma
 *
 * @ORM\Table(name="idioma")
 * @ORM\Entity(repositoryClass="App\Repository\IdiomaRepository")
 */
class Idioma
{
    /**
     * @var int
     *
     * @ORM\Column(name="ididioma", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ididioma;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=false)
     */
    private $descripcion;

    public function getIdidioma(): ?int
    {
        return $this->ididioma;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }


}
