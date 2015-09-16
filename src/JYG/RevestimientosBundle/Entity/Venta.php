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
     * @ORM\Column(name="id_cliente", type="integer")
     */
    private $comprador;

    /**
     * @ORM\OneToMany(targetEntity="Material", mappedBy="venta", cascade={"persist"})
     */
    private $materiales;

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
     */
    public function setComprador($comprador = null)
    {
        $this->comprador = $comprador;
    }

    public function __construct()
    {
        $this->materiales = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fecha = new \DateTime();
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
}
