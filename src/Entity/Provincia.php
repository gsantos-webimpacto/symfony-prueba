<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincia
 *
 * @ORM\Table(name="provincia")
 * @ORM\Entity
 */
class Provincia
{
    /**
     * @var int
     *
     * @ORM\Column(name="idprovincia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprovincia;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pais", type="integer", nullable=true)
     */
    private $pais;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    public function getIdprovincia(): ?int
    {
        return $this->idprovincia;
    }

    public function getPais(): ?int
    {
        return $this->pais;
    }

    public function setPais(?int $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }


}
