<?php

namespace App/Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="uk_correo_user", columns={"correo"})}, indexes={@ORM\Index(name="fk_user_pais", columns={"pais"}), @ORM\Index(name="fk_user_provincia", columns={"provincia"}), @ORM\Index(name="fk_user_idioma", columns={"idioma"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="iduser", type="string", length=22, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=100, nullable=false)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=100, nullable=false)
     */
    private $correo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadenacimiento", type="date", nullable=false)
     */
    private $fechadenacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=6, nullable=false)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=false)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="Datos adicionales", type="string", length=1000, nullable=false)
     */
    private $datosAdicionales;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=100, nullable=false)
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100, nullable=false)
     */
    private $direccion;

    /**
     * @var int
     *
     * @ORM\Column(name="codigopostal", type="integer", nullable=false)
     */
    private $codigopostal;

    /**
     * @var \Idioma
     *
     * @ORM\ManyToOne(targetEntity="Idioma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idioma", referencedColumnName="ididioma")
     * })
     */
    private $idioma;

    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais", referencedColumnName="idpais")
     * })
     */
    private $pais;

    /**
     * @var \Provincia
     *
     * @ORM\ManyToOne(targetEntity="Provincia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provincia", referencedColumnName="idprovincia")
     * })
     */
    private $provincia;


}
