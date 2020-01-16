<?php
// src/Equipo.php
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity 
 * @ORM\Table(name="equipo")
 * @ORM\Entity(repositoryClass="EquipoRepository")
 */
class Equipo{
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

class EquipoRepository extends EntityRepository {	/*devuelve una colección con los jugadores del equipo, -1 si no encuentra el equipo*/
	/**
	 * Devuelve la lista de jugadores de un equipo
	 * 
	 * @param {String} $nombre_equipo Nombre del equipo
	 */
	public function getLista($nombre_equipo) {
		$equipo =  $this->getEntityManager()->getRepository('Equipo')->findOneBy(array('nombre' => $nombre_equipo));
		if(!$equipo) {
			return -1;
		} else {
			$query = $this->getEntityManager()->createQuery("SELECT j FROM jugador j JOIN j.equipo e WHERE e.nombre = '$nombre_equipo'");
			return $query->getResult();
		}				 		
	}
	public function getListaOrdenadaFundacion() {
		//$equipo = $this->getEntityManager()->getRepository('Equipo');
		$query = $this->getEntityManager()->createQuery('SELECT e FROM equipo e ORDER BY e.fundacion ASC');
		return $query->getResult();
	}
}



