<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bitacora
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\BitacoraRepository")
 */
class Bitacora
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
     * @ORM\Column(name="nombre_usuario", type="string", length=255)
     */
    private $usuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer")
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="operacion", type="string", length=255)
     */
    private $operacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="idoperacion", type="integer")
     */
    private $idoperacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;


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
     * Set usuario
     *
     * @param string $usuario
     * @return Bitacora
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set operacion
     *
     * @param string $operacion
     * @return Bitacora
     */
    public function setOperacion($operacion)
    {
        $this->operacion = $operacion;

        return $this;
    }

    /**
     * Get operacion
     *
     * @return string 
     */
    public function getOperacion()
    {
        return $this->operacion;
    }

    /**
     * Set idoperacion
     *
     * @param integer $idoperacion
     * @return Bitacora
     */
    public function setIdoperacion($idoperacion)
    {
        $this->idoperacion = $idoperacion;

        return $this;
    }

    /**
     * Get idoperacion
     *
     * @return integer 
     */
    public function getIdoperacion()
    {
        return $this->idoperacion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Bitacora
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
     * Set idusuario
     *
     * @param integer $idusuario
     * @return Bitacora
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return integer 
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }
}
