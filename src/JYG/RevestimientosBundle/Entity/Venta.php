<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\VentaRepository")
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
     * @ORM\Column(name="direccionCliente", type="text")
     */
    private $direccionCliente;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreCliente", type="string", length=255)
     */
    private $nombreCliente;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;


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
     * Set direccionCliente
     *
     * @param string $direccionCliente
     * @return Venta
     */
    public function setDireccionCliente($direccionCliente)
    {
        $this->direccionCliente = $direccionCliente;

        return $this;
    }

    /**
     * Get direccionCliente
     *
     * @return string 
     */
    public function getDireccionCliente()
    {
        return $this->direccionCliente;
    }

    /**
     * Set nombreCliente
     *
     * @param string $nombreCliente
     * @return Venta
     */
    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;

        return $this;
    }

    /**
     * Get nombreCliente
     *
     * @return string 
     */
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Venta
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }
}
