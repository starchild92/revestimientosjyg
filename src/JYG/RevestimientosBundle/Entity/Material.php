<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\MaterialRepository")
 */
class Material
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
     * @ORM\Column(name="codigo", type="string", length=200)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="formato", type="string", length=255)
     */
    private $formato;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=200)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=200)
     */
    private $nombre;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @ORM\OneToMany(targetEntity="Deposito", mappedBy="material",cascade={"persist","remove"})
     */
    private $almacenes;

    /**
     * @ORM\ManyToOne(targetEntity="Venta", inversedBy="materiales")
     * @ORM\JoinColumn(name="venta_id", referencedColumnName="id")
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
     * Set codigo
     *
     * @param string $codigo
     * @return Material
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set formato
     *
     * @param string $formato
     * @return Material
     */
    public function setFormato($formato)
    {
        $this->formato = $formato;
    
        return $this;
    }

    /**
     * Get formato
     *
     * @return string 
     */
    public function getFormato()
    {
        return $this->formato;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Material
     */
    public function setColor($color)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Material
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
     * Set precio
     *
     * @param float $precio
     * @return Material
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    
        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Material
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->almacenes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add almacenes
     *
     * @param \JYG\RevestimientosBundle\Entity\Deposito $almacenes
     * @return Material
     */
    public function addAlmacene(\JYG\RevestimientosBundle\Entity\Deposito $almacenes)
    {
        $this->almacenes[] = $almacenes;
    
        return $this;
    }

    /**
     * Remove almacenes
     *
     * @param \JYG\RevestimientosBundle\Entity\Deposito $almacenes
     */
    public function removeAlmacene(\JYG\RevestimientosBundle\Entity\Deposito $almacenes)
    {
        $this->almacenes->removeElement($almacenes);
    }

    /**
     * Get almacenes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlmacenes()
    {
        return $this->almacenes;
    }

    /**
     * Set venta
     *
     * @param \JYG\RevestimientosBundle\Entity\Venta $venta
     * @return Material
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
}