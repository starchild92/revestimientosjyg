<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\ClienteRepository")
 * @ORM\Entity
 */
class Cliente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="rif", type="string", length=255)
     * @Assert\Regex(
     *     pattern="/[a-zA-Z]+[-]+\d+[-]+(\d{1})*|([a-zA-Z]+[-]+\d*)/",
     *     match=true,
     *     message="Ejemplo: J-00000000-0 o V-00000000"
     * )
     */
    private $rif;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Su nombre no puede contener números o simbolos especiales"
     * )
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Por favor, escriba un nombre de al menos 2 letras",
     *      maxMessage = "Solo tiene permitido 50 caracteres para este campo"
     * )
     */
    private $nombre;

    /**
     * @var text
     *
     * @ORM\Column(name="direccion", type="text", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     * @Assert\Regex(
     *     pattern="/([\+^0-9 ()-])+/",
     *     match=true,
     *     message="Ejemplo. +58 400 0000000 ó (0400) 0000000 ó +58 400-000-00-00"
     * )
     */
    private $telefono;

    /**
     * @ORM\OneToMany(targetEntity="Venta", mappedBy="comprador",cascade={"persist","remove"})
     */
    private $compras;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rif
     *
     * @param string $rif
     * @return Cliente
     */
    public function setRif($rif)
    {
        $this->rif = $rif;

        return $this;
    }

    /**
     * Get rif
     *
     * @return string 
     */
    public function getRif()
    {
        return $this->rif;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Cliente
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Cliente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Cliente
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function __toString() {
        return $this->nombre.', '.$this->rif.'. Telf.: '.$this->telefono;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->compras = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add compras
     *
     * @param \JYG\RevestimientosBundle\Entity\Venta $compras
     * @return Cliente
     */
    public function addCompra(\JYG\RevestimientosBundle\Entity\Venta $compras)
    {
        $this->compras[] = $compras;
    
        return $this;
    }

    /**
     * Remove compras
     *
     * @param \JYG\RevestimientosBundle\Entity\Venta $compras
     */
    public function removeCompra(\JYG\RevestimientosBundle\Entity\Venta $compras)
    {
        $this->compras->removeElement($compras);
    }

    /**
     * Get compras
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompras()
    {
        return $this->compras;
    }
}
