<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Consulta
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Consulta
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
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=255)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="asunto", type="string", length=100)
     */
    private $asunto;

    /**
     * @var string
     *
     * @ORM\Column(name="mensaje", type="string", length=255)
     */
    private $mensaje;


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
     * @return Consulta
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
     * Set correo
     *
     * @param string $correo
     * @return Consulta
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
     * Set asunto
     *
     * @param string $asunto
     * @return Consulta
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;
    
        return $this;
    }

    /**
     * Get asunto
     *
     * @return string 
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set mensaje
     *
     * @param string $mensaje
     * @return Consulta
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    
        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string 
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
         $metadata->addPropertyConstraint('nombre', new Assert\NotBlank());

        $metadata->addPropertyConstraint('correo', new Assert\Email(array(
            'message' => 'El correo "{{ value }}" no es valido.',
            'checkMX' => true,
        )));

        $metadata->addPropertyConstraint('asunto', new Assert\NotBlank());
        //$metadata->addPropertyConstraint('asunto', new MaxLength(50));

        $metadata->addPropertyConstraint('asunto', new Assert\Length(array(
            'min'        => 2,
            'max'        => 50,
            'minMessage' => 'El cuerpo del mensaje debe ser mayor a {{ limit }}',
            'maxMessage' => 'El cuerpo del mensaje debe ser menor a {{ limit }}',
        )));

        //$metadata->addPropertyConstraint('body', new Assert\MinLength(50));
        $metadata->addPropertyConstraint('mensaje', new Assert\Length(array(
            'min'        => 10,
            'minMessage' => 'El mensaje debe contener al menos {{ limit }} caracteres.',
        )));
    }
}
