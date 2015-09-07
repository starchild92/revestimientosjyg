<?php

namespace JYG\RevestimientosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Material
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JYG\RevestimientosBundle\Entity\MaterialRepository")
 * @ORM\HasLifecycleCallbacks
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
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     * @Assert\GreaterThan(
     *     value = 0,
     *     message = "Debe ser un valor mayor a 0"
     * )
     * @Assert\Type(
     *     type="float",
     *     message="El valor {{ value }} no válido."
     * )
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


    public function  __toString(){
        return $this->codigo;
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
        $this->almacenes = new ArrayCollection();
    }

    /**
     * Add almacenes
     *
     * @param \JYG\RevestimientosBundle\Entity\Deposito $almacenes
     * @return Material
     */
    public function addAlmacenes(\JYG\RevestimientosBundle\Entity\Deposito $almacenes)
    {
        $this->almacenes[] = $almacenes;
    
        return $this;
    }
    
    /* Esta funcion agrega los almacenes porque la de arriba no se que coño hace */
    public function setAlmacenes($almacenes){
        $this->almacenes = $almacenes;
        foreach ($almacenes as $almacen) {
            $almacen->setMaterial($this);
        }
    }

    /**
     * Remove almacenes
     *
     * @param \JYG\RevestimientosBundle\Entity\Deposito $almacenes
     */
    public function removeAlmacenes(\JYG\RevestimientosBundle\Entity\Deposito $almacenes)
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

    /**
     * @Assert\File(maxSize="6000000", maxSizeMessage = "El Archivo pesa demasiado.", mimeTypesMessage = "Sube una foto valida")
     */
    private $file;

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    public function getAbsolutePath()
    {
        $id = $this->getCodigo();
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // la ruta absoluta del directorio donde se deben
        // guardar los archivos cargados
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // se deshace del __DIR__ para no meter la pata
        // al mostrar el documento/imagen cargada en la vista.
        return 'bundles/jygrevestimientos/images/materiales';
    }

    private $temp;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (is_file($this->getAbsolutePath())) {
            // store the old name to delete after the update
            $this->temp = $this->getAbsolutePath();
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            $this->path = $this->getCodigo().'.'.$this->getFile()->getClientOriginalExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->temp);
            // clear the temp image path
            $this->temp = null;
        }

        // you must throw an exception here if the file cannot be moved
        // so that the entity is not persisted to the database
        // which the UploadedFile move() method does
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->codigo.'.'.$this->getFile()->getClientOriginalExtension()
        );

        $this->setFile(null);
    }

    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (isset($this->temp)) {
            // file_exists me dice si está, entonces lo puedo borrar.
            if(file_exists($this->temp)){
                unlink($this->temp);
            }
        }
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Material
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
}
