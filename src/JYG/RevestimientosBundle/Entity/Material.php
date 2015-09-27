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
     * @ORM\Column(name="codigo", type="string", length=200, nullable=false)
     * @ORM\OneToMany(targetEntity="Item", mappedBy="codigomaterial", cascade={"persist","remove"})
     * @Assert\Regex(
     *     pattern="/[(,)]/",
     *     match=false,
     *     message="El código del material no puede tener comas (,)."
     * )
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="formato", type="string", length=255)
     */
    private $formato;

    /*/**
     * @var string
     *
     * @ORM\Column(name="tamano", type="string", length=255, nullable=true)
     */
    //private $tamano;*/

    /*/**
     * @var string
     *
     * @ORM\Column(name="unidad", type="string", length=255, nullable=true)
     */
    //private $unidad;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=200, nullable=true)
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
     * @ORM\Column(name="precioventa", type="float")
     * @Assert\GreaterThan(
     *     value = 0,
     *     message = "Debe ser un valor mayor a 0"
     * )
     * @Assert\Type(
     *     type="numeric",
     *     message="El valor {{ value }} no válido."
     * )
     */
    private $precioventa;

    /**
     * @var float
     *
     * @ORM\Column(name="preciocompra", type="float")
     * @Assert\GreaterThan(
     *     value = 0,
     *     message = "Debe ser un valor mayor a 0"
     * )
     * @Assert\Type(
     *     type="numeric",
     *     message="El valor {{ value }} no válido."
     * )
     */
    private $preciocompra;

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
     * @ORM\ManyToOne(targetEntity="CompraMaterial")
     * @ORM\JoinColumn(name="compramaterial_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $compra;

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
        $codigo = strtoupper($codigo);
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

    public function  __toString(){

        /*$dep = $this->getAlmacenes();
        $cant_alm = $dep->count();
        $cad = '';
        for ($i=0; $i < $cant_alm ; $i++) {
            $nombre_dep = $dep[$i]->getNombrealmacen();
            if ($nombre_dep == 'Depósito Origen') {
                $nombre_dep = "Origen";
            }else{
                $nombre_dep = "Tienda";
            }
            $cad = $nombre_dep.':'.$dep[$i]->getCantmaterialdisponible().', '.$cad;
        }
        $cad = rtrim($cad, ', ');
        return $this->codigo.', '.$this->nombre.' ('.$this->tipo.')['.$cad.']';*/
        return $this->codigo.', '.$this->nombre.' ('.$this->tipo.')';
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

    /**
     * Set precioventa
     *
     * @param float $precioventa
     * @return Material
     */
    public function setPrecioventa($precioventa)
    {
        $this->precioventa = $precioventa;
    
        return $this;
    }

    /**
     * Get precioventa
     *
     * @return float 
     */
    public function getPrecioventa()
    {
        return $this->precioventa;
    }

    /**
     * Set preciocompra
     *
     * @param float $preciocompra
     * @return Material
     */
    public function setPreciocompra($preciocompra)
    {
        $this->preciocompra = $preciocompra;
    
        return $this;
    }

    /**
     * Get preciocompra
     *
     * @return float 
     */
    public function getPreciocompra()
    {
        return $this->preciocompra;
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
/*--------------------------------FUCKING IMAGEN--------------------------------------------------*/
     /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    public function getAbsolutePath()
    {
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
            $this->path
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


/* ---------------------------FIN FUCKING IMAGEN-------------------------------------------------------*/
   /* /**
     * Set unidad
     *
     * @param string $unidad
     * @return Material
     */
    /*public function setUnidad($unidad)
    {
        $this->unidad = $unidad;
    
        return $this;
    }

    /**
     * Get unidad
     *
     * @return string 
     */
    /*public function getUnidad()
    {
        return $this->unidad;
    }*/

   /* /**
     * Set tamano
     *
     * @param string $tamano
     * @return Material
     */ 
    /*public function setTamano($tamano)
    {
        $this->tamano = $tamano;
    
        return $this;
    }

    /**
     * Get tamano
     *
     * @return string 
     */
   /* public function getTamano()
    {
        return $this->tamano;
    }*/      
}
