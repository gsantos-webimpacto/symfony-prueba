<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserRegistro
 *
 * @ORM\Table(name="user_registro")
 * @ORM\Entity
 */
class UserRegistro
{
    /**
     * @var string
     *
     * @ORM\Column(name="password", type="blob", length=65535, nullable=false)
     */
    private $password;

    /**
     * @var \User
     * @ORM\Column(name="idpais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * })
     */
    private $correo;

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCorreo(): ?User
    {
        return $this->correo;
    }

    public function setCorreo(?User $correo): self
    {
        $this->correo = $correo;

        return $this;
    }


}
