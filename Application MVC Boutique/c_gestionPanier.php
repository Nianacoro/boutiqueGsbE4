<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirPanier':
		$lesMedicaments = getLesMedicamentsDuPanier();
		$lesQuantites = getLesQuantitesDuPanier();
		include("vues/v_panier.php");
		break;
	case 'supprimerUnMedicament':
		$idMedicament=$_REQUEST['medicament'];
		retirerDuPanier($idMedicament);
		$lesMedicaments = getLesMedicamentsDuPanier();
		$lesQuantites = getLesQuantitesDuPanier();
		include("vues/v_panier.php");
		break;
	case 'passerCommande' :
			$nom ='';$rue='';$ville ='';$cp='';$mail='';
			include ("vues/v_commande.php");			
		break;
	case 'confirmerCommande'	:	
			$nom =$_REQUEST['nom'];$rue=$_REQUEST['rue'];$ville =$_REQUEST['ville'];$cp=$_REQUEST['cp'];$mail=$_REQUEST['mail'];
			include ("vues/v_commande.php");
			$msgErreurs = getErreursSaisieCommande($cp,$mail);
			if (count($msgErreurs)!=0)
				include ("vues/v_erreurs.php");
			else {
				creerCommande($nom,$rue,$cp,$ville,$mail );
				echo "La commande a bien été prise en compte";
			}
		break;	
}
?>


