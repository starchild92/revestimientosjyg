<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="identificador")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $comprador;

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
     * Set comprador
     *
     * @param \JYG\RevestimientosBundle\Entity\Cliente $comprador
     * @return Venta
     */
    public function setComprador(\JYG\RevestimientosBundle\Entity\Cliente $comprador = null)
    {
        $this->comprador = $comprador;

        return $this;
    }

    /**
     * Get comprador
     *
     * @return \JYG\RevestimientosBundle\Entity\Cliente 
     */
    public function getComprador()
    {
        return $this->comprador;
    }

    public function __toString()
    {
        return $this->comprador->getNombre();
    }

    public function __construct()
    {
        $this->fecha = new \DateTime();
    }
}
