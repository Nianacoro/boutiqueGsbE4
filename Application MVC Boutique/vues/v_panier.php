<img src="images/panier.gif"	alt="Panier" title="panier"/>
<img src="images/panier.jpg"	alt="Panier" title="panier"/>
<?php
foreach( $lesMedicaments as $unMedicament) 
{
	$id = $unMedicament->getId();
	$libelle = $unMedicament->getLibelle();
	$image = $unMedicament->getImage();	
	$quantite = $lesQuantites[$id];
	$url ="<a href=index.php?uc=gererPanier&medicament=$id&action=supprimerUnMedicament>supprimer </a>";
	
	echo "
			<p><img src=".$image." alt=image width=100	height=100 />
			$libelle
			Quantite : $quantite
			$url
			</p>";
}
?>
<br>
<a href=index.php?uc=gererPanier&action=passerCommande>Passer la commande</a>
