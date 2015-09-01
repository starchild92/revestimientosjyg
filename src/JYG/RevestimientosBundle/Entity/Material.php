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
     * @ORM\Column(name="formato", type="string", length=100)
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
     * @ORM\Column(name="cantdisponiblealmacen", type="float")
     */
    private $cantdisponiblealmacen;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="almacen", type="string", length=200)
     */
    private $almacen;

    /**
     * @var string
     *
     * @ORM\Column(name="tipodematerial", type="string", length=255)
     */
    private $tipodematerial;

    /**
     * @var string
     *
     * @ORM\Column(name="unidad", type="string", length=255)
     */
    private $unidad;


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
     * Set cantdisponiblealmacen
     *
     * @param float $cantdisponiblealmacen
     * @return Material
     */
    public function setCantdisponiblealmacen($cantdisponiblealmacen)
    {
        $this->cantdisponiblealmacen = $cantdisponiblealmacen;

        return $this;
    }

    /**
     * Get cantdisponiblealmacen
     *
     * @return float 
     */
    public function getCantdisponiblealmacen()
    {
        return $this->cantdisponiblealmacen;
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
     * Set almacen
     *
     * @param string $almacen
     * @return Material
     */
    public function setAlmacen($almacen)
    {
        $this->almacen = $almacen;

        return $this;
    }

    /**
     * Get almacen
     *
     * @return string 
     */
    public function getAlmacen()
    {
        return $this->almacen;
    }

    /**
     * Set tipodematerial
     *
     * @param string $tipodematerial
     * @return Material
     */
    public function setTipodematerial($tipodematerial)
    {
        $this->tipodematerial = $tipodematerial;

        return $this;
    }

    /**
     * Get tipodematerial
     *
     * @return string 
     */
    public function getTipodematerial()
    {
        return $this->tipodematerial;
    }

    /**
     * Set unidad
     *
     * @param string $unidad
     * @return Material
     */
    public function setUnidad($unidad)
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Get unidad
     *
     * @return string 
     */
    public function getUnidad()
    {
        return $this->unidad;
    }
}
