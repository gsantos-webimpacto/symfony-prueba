<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 */
class Producto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     */
    private $urlimagen;

    /**
     * @ORM\Column(type="string")
     */
    private $fabricante;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio;

    /**
     * @var json
     *
     * @ORM\Column(name="tags", type="json")
     */
    private $tags;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $descripcion;

    public function getId(): ?int
    {
        return $this->id;
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

    
    public function getUrlimagen(): ?string
    {
        return $this->urlimagen;
    }

    public function setUrlimagen(string $urlimagen): self
    {
        $this->urlimagen = $urlimagen;

        return $this;
    }

    public function getFabricante(): ?string
    {
        return $this->fabricante;
    }

    public function setFabricante(string $fabricante): self
    {
        $this->fabricante = $fabricante;

        return $this;
    }

    public function getPrecio(): ?int
    {
        return $this->precio;
    }

    public function setPrecio(int $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getTags(): array
    {
        $tags = $this->tags;
        // guarantee every user at least has ROLE_USER
        $tags[] = '';
        return array_unique($tags);
    }

    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
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
