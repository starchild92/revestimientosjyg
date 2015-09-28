<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * CompraMaterial
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\CompraMaterialRepository")
 */
class CompraMaterial
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
     * @ORM\Column(name="nrocontrolfactura", type="string", length=255)
     */
    private $nrocontrolfactura;

    /**
     * @var \Date
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="subtotal", type="float")
     */
    private $subtotal;

    /**
     * @var float
     *
     * @ORM\Column(name="iva", type="float")
     */
    private $iva;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;

    /**
     * @ORM\OneToMany(targetEntity="ItemCompra", mappedBy="compra", cascade={"persist","remove"})
     * @Assert\Valid
     */
    private $material;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->material = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nrocontrolfactura
     *
     * @param string $nrocontrolfactura
     * @return CompraMaterial
     */
    public function setNrocontrolfactura($nrocontrolfactura)
    {
        $this->nrocontrolfactura = $nrocontrolfactura;

        return $this;
    }

    /**
     * Get nrocontrolfactura
     *
     * @return string 
     */
    public function getNrocontrolfactura()
    {
        return $this->nrocontrolfactura;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return CompraMaterial
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
     * Set subtotal
     *
     * @param float $subtotal
     * @return CompraMaterial
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get subtotal
     *
     * @return float 
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set iva
     *
     * @param float $iva
     * @return CompraMaterial
     */
    public function setIva($iva)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get iva
     *
     * @return float 
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return CompraMaterial
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Add material
     *
     * @param \JYG\RevestimientosBundle\Entity\ItemCompra $material
     * @return CompraMaterial
     */
    public function addMaterial(\JYG\RevestimientosBundle\Entity\ItemCompra $material)
    {
        $this->material[] = $material;

        return $this;
    }

    /**
     * Remove material
     *
     * @param \JYG\RevestimientosBundle\Entity\ItemCompra $material
     */
    public function removeMaterial(\JYG\RevestimientosBundle\Entity\ItemCompra $material)
    {
        $this->material->removeElement($material);
    }

    /**
     * Get material
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMaterial()
    {
        return $this->material;
    }

    
}
