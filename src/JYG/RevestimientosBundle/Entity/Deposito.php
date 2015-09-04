<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deposito
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\DepositoRepository")
 */
class Deposito
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
     * @ORM\Column(name="nombrealmacen", type="string", length=255)
     */
    private $nombrealmacen;

    /**
     * @ORM\ManyToOne(targetEntity="Material", inversedBy="almacenes")
     * @ORM\JoinColumn(name="material_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $material;

    /**
     * @var float
     *
     * @ORM\Column(name="cantmaterialdisponible", type="float")
     */
    private $cantmaterialdisponible;

    public function  __toString(){
        return (string) $this->nombrealmacen;
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
     * Set nombrealmacen
     *
     * @param string $nombrealmacen
     * @return Deposito
     */
    public function setNombrealmacen($nombrealmacen)
    {
        $this->nombrealmacen = $nombrealmacen;
    
        return $this;
    }

    /**
     * Get nombrealmacen
     *
     * @return string 
     */
    public function getNombrealmacen()
    {
        return $this->nombrealmacen;
    }

    /**
     * Set material
     *
     * @param \JYG\RevestimientosBundle\Entity\Material $material
     * @return Deposito
     */
    public function setMaterial(\JYG\RevestimientosBundle\Entity\Material $material = null)
    {
        $this->material = $material;
    
        return $this;
    }

    /**
     * Get material
     *
     * @return \JYG\RevestimientosBundle\Entity\Material 
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set cantmaterialdisponible
     *
     * @param float $cantmaterialdisponible
     * @return Deposito
     */
    public function setCantmaterialdisponible($cantmaterialdisponible)
    {
        $this->cantmaterialdisponible = $cantmaterialdisponible;
    
        return $this;
    }

    /**
     * Get cantmaterialdisponible
     *
     * @return float 
     */
    public function getCantmaterialdisponible()
    {
        return $this->cantmaterialdisponible;
    }
}
