<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Item
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\ItemRepository")
 */
class Item
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
     * @var float
     *
     * @ORM\Column(name="cantidad", type="float")
     * @Assert\GreaterThan(
     *     value = 0,
     *     message = "Debe ser un valor mayor a 0"
     * )
     * @Assert\Type(
     *     type="numeric",
     *     message="El valor {{ value }} no válido."
     * )
     */
    private $cantidad;

    /**
     * @var text
     *
     * @ORM\Column(name="descripcionmaterial", type="text")
     */
    private $descripcionmaterial;

    /**
     * @ORM\ManyToOne(targetEntity="Material")
     * @ORM\JoinColumn(name="material_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $codigomaterial;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Venta", inversedBy="items")
     * @ORM\JoinColumn(name="venta_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $venta;

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
     * Set cantidad
     *
     * @param float $cantidad
     * @return Item
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return float 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set descripcionmaterial
     *
     * @param string $descripcionmaterial
     * @return Item
     */
    public function setDescripcionmaterial($descripcionmaterial)
    {
        $this->descripcionmaterial = $descripcionmaterial;

        return $this;
    }

    /**
     * Get descripcionmaterial
     *
     * @return string 
     */
    public function getDescripcionmaterial()
    {
        return $this->descripcionmaterial;
    }

    /**
     * Set codigomaterial
     *
     * @param string $codigomaterial
     * @return Item
     */
    public function setCodigomaterial($codigomaterial)
    {
        $this->codigomaterial = $codigomaterial;

        return $this;
    }

    /**
     * Get codigomaterial
     *
     * @return string 
     */
    public function getCodigomaterial()
    {
        return $this->codigomaterial;
    }

    /**
     * Set venta
     *
     * @param \JYG\RevestimientosBundle\Entity\Venta $venta
     * @return Item
     */
    public function setVenta(\JYG\RevestimientosBundle\Entity\Venta $venta = null)
    {
        $this->venta = $venta;
    
        return $this;
    }

    /**
     * Get venta
     *
     * @return \JYG\RevestimientosBundle\Entity\Venta 
     */
    public function getVenta()
    {
        return $this->venta;
    }
    /* Funcion que agrega el material id si no existe en la tabla deposito*/
    public function addVenta(Venta $venta){
        if(!$this->venta->contains($venta)){
            $this->venta->add($venta);
        }
    }
}
