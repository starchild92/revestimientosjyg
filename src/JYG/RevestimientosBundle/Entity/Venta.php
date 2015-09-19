<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Venta
 *
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\VentaRepository")
 * @ORM\Table(name="venta")
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

    //con una relacion a cliente
    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="venta",cascade={"persist"})
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\Valid
     */
    private $comprador;

    /**
     * @ORM\OneToMany(targetEntity="Item", mappedBy="venta", cascade={"persist","remove"})
     * @Assert\Valid
     **/
    private $items;

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
    public function setComprador($comprador)
    {
        $this->comprador = $comprador;
    }

    public function __construct()
    {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fecha = new \DateTime();
    }


    /* Esta funcion agrega los items */
    public function setItems($items){
        $this->items = $items;
        foreach ($items as $item) {
            $item->setVenta($this);
        }
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
     * Add items
     *
     * @param \JYG\RevestimientosBundle\Entity\Item $items
     * @return Venta
     */
    public function addItem(\JYG\RevestimientosBundle\Entity\Item $items)
    {
        $this->items[] = $items;
    
        return $this;
    }

    /**
     * Remove items
     *
     * @param \JYG\RevestimientosBundle\Entity\Item $items
     */
    public function removeItem(\JYG\RevestimientosBundle\Entity\Item $items)
    {
        $this->items->removeElement($items);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getItems()
    {
        return $this->items;
    }
}
