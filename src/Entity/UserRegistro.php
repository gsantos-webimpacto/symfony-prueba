<?php

namespace App/Entity;

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
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="correo", referencedColumnName="correo")
     * })
     */
    private $correo;


}
