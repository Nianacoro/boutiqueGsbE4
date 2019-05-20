<?PHP
class Medicament {
	private $id;
	private $libelle;
	private $prix;
	private $image;

	// constructeur
	function __construct($unId, $unLibelle, $uneImage, $unPrix)
	{
		$this->id = $unId;
		$this->description = $unLibelle;
		$this->prix = $unPrix;
		$this->image = $uneImage;
	}
	// accesseur
	public function getId()
	{
		return $this->id ;
	}
	public function getLibelle()
	{
		return $this->libelle;
	}	
	public function getPrix()
	{
		return $this->prix;
	}
	public function getImage()
	{
		return $this->image ;
	}
} // fin de la classe
?>