<?php
// src/Partido.php
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="partido")
 * @ORM\Entity(repositoryClass="PartidoBidireccionalRepository")
 */
class PartidoBidireccional {
    /**
     * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="EquipoBidireccional2", inversedBy="partidosLocal")
     * @ORM\JoinColumn(name="local", referencedColumnName="id")
     */
    private $local;
    /**
     * @ORM\ManyToOne(targetEntity="EquipoBidireccional2", inversedBy="partidosLocal")
     * @ORM\JoinColumn(name="visitante", referencedColumnName="id")
     */
    private $visitante;
    /**
     * @ORM\Column(type="integer", name="goles_local")
     */
    private $golesLocal;
    /**
     * @ORM\Column(type="integer", name="goles_visitante")
     */
    private $golesVisitante;
    /**
     * @ORM\Column(type="date", name="fecha")
     */
    private $fecha;

    public function getId() { return $this->id; }
    
    public function getLocal() { return $this->local; }
    public function setLocal($local) { $this->local = $local; }

    public function getVisitante() { return $this->visitante; }
    public function setVisitante($visitante) { $this->visitante = $visitante; }

    public function getGolesLocal() { return $this->golesLocal; }
    public function setGolesLocal($golesLocal) { $this->golesLocal = $golesLocal; }

    public function getGolesVisitante() { return $this->golesVisitante; }
    public function setGolesVisitante($golesVisitante) { $this->golesVisitante = $golesVisitante; }

    public function getFecha() { return $this->fecha; }
    public function setFecha($fecha) { $this->fecha = $fecha; }
}