<?PHP
class Panier 
{
    private $panier;

	// constructeur
	function __construct()
	{ 	
		$this->panier = array();
	}
	// ajouter un article 
	public function ajoutItem($refMedicament,$nb) 
	{
            if (isset($this->panier[$refMedicament])) {
                    $this->panier[$refMedicament] += $nb;
            }
            else {
                    $this->panier[$refMedicament] = $nb;
            }
	}	
	// supprimer un article 
	public function suppressionItem($refMedicament,$nb) 
	{
		$this->panier[$refMedicament] -= $nb;
		if ($this->panier[$refMedicament] <= 0) {
			unset ($this->panier[$refMedicament]);
                }
	}			
	// renvoit les références et les quantites
	public function recupPanier()
	{
		return $this->panier;
	}
} // fin de la classe
?>