<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Venta
 *
 * @ORM\Table(name="venta")
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\VentaRepository")
 * @ORM\Entity
 */
class Venta
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="cliente", type="string")
     */
    private $cliente;

    /**
     * @ORM\OneToMany(targetEntity="Material", mappedBy="venta")
     */
    private $materiales;   

    /**
     * @var \float
     *
     * @ORM\Column(name="cantmatvendido", type="float")
     */
    private $cantmatvendido;

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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Venta
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Venta
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set cliente
     *
     * @param string $cliente
     * @return Venta
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->materiales = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add materiales
     *
     * @param \JYG\RevestimientosBundle\Entity\Material $materiales
     * @return Venta
     */
    public function addMateriale(\JYG\RevestimientosBundle\Entity\Material $materiales)
    {
        $this->materiales[] = $materiales;
    
        return $this;
    }

    /**
     * Remove materiales
     *
     * @param \JYG\RevestimientosBundle\Entity\Material $materiales
     */
    public function removeMateriale(\JYG\RevestimientosBundle\Entity\Material $materiales)
    {
        $this->materiales->removeElement($materiales);
    }

    /**
     * Get materiales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMateriales()
    {
        return $this->materiales;
    }

    /**
     * Set cantmatvendido
     *
     * @param float $cantmatvendido
     * @return Venta
     */
    public function setCantmatvendido($cantmatvendido)
    {
        $this->cantmatvendido = $cantmatvendido;
    
        return $this;
    }

    /**
     * Get cantmatvendido
     *
     * @return float 
     */
    public function getCantmatvendido()
    {
        return $this->cantmatvendido;
    }
}
