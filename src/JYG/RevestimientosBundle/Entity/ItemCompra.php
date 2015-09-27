<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ItemCompra
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\ItemCompraRepository")
 */
class ItemCompra
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
     * @ORM\ManyToOne(targetEntity="Material")
     * @ORM\JoinColumn(name="material_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $codigomaterial;

    /**
     * @var string
     *
     * @ORM\Column(name="deposito", type="string", length=255)
     */
    private $deposito;


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
     * @return ItemCompra
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
     * Set deposito
     *
     * @param string $deposito
     * @return ItemCompra
     */
    public function setDeposito($deposito)
    {
        $this->deposito = $deposito;

        return $this;
    }

    /**
     * Get deposito
     *
     * @return string 
     */
    public function getDeposito()
    {
        return $this->deposito;
    }

    /**
     * Set codigomaterial
     *
     * @param \JYG\RevestimientosBundle\Entity\Material $codigomaterial
     * @return ItemCompra
     */
    public function setCodigomaterial(\JYG\RevestimientosBundle\Entity\Material $codigomaterial = null)
    {
        $this->codigomaterial = $codigomaterial;

        return $this;
    }

    /**
     * Get codigomaterial
     *
     * @return \JYG\RevestimientosBundle\Entity\Material 
     */
    public function getCodigomaterial()
    {
        return $this->codigomaterial;
    }
}
