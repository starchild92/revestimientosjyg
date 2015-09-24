<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\UsuarioRepository")
 * @UniqueEntity("correo", message="Esta dirección de correo ya está en uso")
 * @UniqueEntity("username", message="Este username ya existe")
 */
class Usuario
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
     * @ORM\Column(name="nombre", type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Su nombre debe tener al menos {{ limit }} letras",
     *      maxMessage = "Su nombre no puede tener {{ limit }} letras"
     * )
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Su apellido debe tener al menos {{ limit }} letras",
     *      maxMessage = "Su apellido no puede tener {{ limit }} letras"
     * )
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     * @Assert\Regex(
     *     pattern="/([\+^0-9 ()-])+/",
     *     match=true,
     *     message="Ejemplo. +58 400 0000000 ó (0400) 0000000 ó +58 400-000-00-00"
     * )
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=255)
     * @Assert\Email(
     *     message = "El mail {{ value }} no es válido.",
     *     checkMX = true,
     *     checkHost = true
     * )
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

     /**
     * @var string
     *
     * @ORM\Column(name="cuenta", type="string", length=50)
     */
    private $cuenta = 'Usuario';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\Length(
     *      min = 5,
     *      max = 18,
     *      minMessage = "Escriba una clave con 5 o más letras y menos o {{ limit }} letras",
     *      maxMessage = "La clave que ha escrito supera el límite de {{ limit }} letras"
     * )
     */
    private $password;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
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
     * Set apellido
     *
     * @param string $apellido
     * @return Usuario
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Usuario
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

    /**
     * Set correo
     *
     * @param string $correo
     * @return Usuario
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     * @return Usuario
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
    
        return $this;
    }

    /**
     * Get cuenta
     *
     * @return string 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }
}
