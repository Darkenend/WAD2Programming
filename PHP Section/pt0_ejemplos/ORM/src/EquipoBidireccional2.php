<?php
// src/EquipoBidireccional2.php
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="equipo")
 */
class EquipoBidireccional2 {
    
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id;
    
    /** @ORM\Column(type="string") **/
    private $nombre;
    
    /** @ORM\Column(type="integer") **/
	private $fundacion;
    
    /** @ORM\Column(type="integer") **/
	private $socios;
    
    /** @ORM\Column(type="string") **/
    private $ciudad;
	
	/**
     * Partidos como local
     * @ORM\OneToMany(targetEntity="PartidoBidireccional", mappedBy="local")
     */
    private $partidosLocal;

    /**
     * Partidos como visitante
     * @ORM\OneToMany(targetEntity="PartidoBidireccional", mappedBy="visitante")
     */
    private $partidosVisitante;
    
	
	public function __construct() {
        $this->partidosLocal = new ArrayCollection();
        $this->partidosVisitante = new ArrayCollection();
    }
    
    public function getPartidosLocal() { return $this->partidosLocal; }

    public function getPartidosVisitante() { return $this->partidosVisitante; }
    
    public function getId() { return $this->id; }

    public function getNombre() { return $this->nombre; }

    public function setNombre($nombre) { $this->nombre = $nombre; }
    
    public function getFundacion() { return $this->fundacion; }

    public function setFundacion($fundacion) { $this->fundacion = $fundacion; }

	public function getSocios() { return $this->socios; }
	
    public function setSocios($socios) { $this->socios = $socios; }
    
	public function getCiudad() { return $this->ciudad; }
	
	public function setCiudad($ciudad) { $this->ciudad = $ciudad; }  
}