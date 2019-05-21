<?php
function connexion()
{
   $hote="localhost";
   $login="root";
   $mdp="";
   $db="gsb(3)";
   $connexion = new PDO("mysql:host=$hote;dbname=$db", $login, $mdp)or die('Erreur connexion à la base de données');
   return $connexion;
}

function verifLogin($nom, $mdp)
{
  $admin = null;
  $connexion = connexion();
  $requete = "select nom from administrateur where nom='$nom' and mdp='$mdp';";
  $resultat = $connexion->query($requete);
  $admin = $resultat->fetch();
  return $admin;
}

function modification($unId, $unNom, $unPrix)
{
  $admin = null;
  $connexion = connexion();
  $requete = "UPDATE medicament set description='$unNom', prix='$unPrix' where idProduit='$unId';";
  $admin = $connexion->exec($requete);
  return $admin;
}

function supprimer($unId)
{
  $admin = null;
  $connexion = connexion();
  echo $unId;
  $requete = "DELETE FROM medicament where idProduit='$unId';";
  $admin = $connexion->exec($requete);
  return $admin;
}

function ajouter($unId, $unNom, $unPrix, $uneImage, $uneCategorie)
{
  $admin = null;
  $connexion = connexion();
  $requete = "insert into medicament values ('$unId', '$unNom', '$unPrix', '$uneImage', '$uneCategorie');";
  $admin = $connexion->exec($requete);
  return $admin;
}

function getLesCategories()
{
    $lesCategories = array();
	$connexion = connexion();
	$requete = "select * from categorie";
   	$resultat = $connexion->query($requete);
    $lesLignes = $resultat->fetchAll();
   	foreach ($lesLignes as $ligne) 	
   		{   
		$idCategorie = $ligne["idCategorie"];
        $categorie = new Categorie($idCategorie,$ligne["libelle"]);
        $lesCategories[$idCategorie]=$categorie;
    	}
	return $lesCategories;
}

function getLesMedicaments($uneCategorie)
{
    $lesMedicaments = array();
	$connexion = connexion();
	$requete ="select * from medicament where idCategorie = '$uneCategorie'";
	$resultat = $connexion->query($requete);
        $lesLignes = $resultat->fetchAll();
   	foreach ($lesLignes as $ligne) 	
   	{
        $medicament = new Medicament($ligne["idMedicament"],$ligne["libelle"],$ligne["image"],$ligne["prix"]);	
		$lesMedicaments[$ligne["idMedicament"]] = $medicament;		
 	}
	return $lesMedicaments;
}
function getMedicament($unId)
{
    $medicament = null;
	$connexion = connexion();
	$requete = "select * from medicament where idMedicament = '$unId'";
   	$resultat = $connexion->query($requete);
    $ligne = $resultat->fetch();
   	if ($ligne != FALSE)
   	{
    	$medicament = new Medicament($ligne["idMedicament"],$ligne["libelle"],$ligne["image"], $ligne["prix"]);	// value de l'image à afficher
	}
	return $medicament;
}
function initPanier()
{
	if(!isset($_SESSION['panier'])){
		$_SESSION['panier']= new Panier();
        }
}
function ajouterAuPanier($idMedicament, $qte)
{	
	$_SESSION['panier']->ajoutItem($idMedicament,$qte);	
}
function retirerDuPanier($idMedicament)
{
	$_SESSION['panier']->suppressionItem($idMedicament,1);
}
function getLesMedicamentsDuPanier()
{	$lesMedicaments = array();
	if (isset($_SESSION["panier"])){		
		$panier = $_SESSION["panier"]->recupPanier();		
		foreach($panier as $id => $qte)
		{
				$medicament = getMedicament($id);
				$lesMedicaments[]=$medicament;
		}		
	}
	return $lesMedicaments;
}
function getLesQuantitesDuPanier()
{	
	$lesQuantites = array();
	if (isset($_SESSION["panier"])){	
		$panier = $_SESSION["panier"]->recupPanier();	
		foreach($panier as $id => $qte)
		{
				$lesQuantites[$id]=$qte;
		}				
	}
	return $lesQuantites;		
}
function creerCommande($nom,$rue,$cp,$ville,$mail )
{
	$connexion = connexion();
	$requete = "select max(idCommande) as maxi from commande";
    $resultat = $connexion->query($requete);
    $ligne = $resultat->fetch();
   	$idCommande = $ligne['maxi'];
   	$idCommande++;
	$date=date("Y-m-j");
   	$requete = "insert into commande values ('$idCommande','$date','$nom','$rue','$cp','$ville','$mail')";
   	$resultat = $connexion->query($requete);
   	$panier = $_SESSION['panier']->recupPanier();
	foreach($panier as $id=>$qte)
	{
		$requete = "insert into contenir values ('$idCommande','$id','$qte')";
		$resultat = $connexion->query($requete);
	}	
	session_destroy();
}
function estUnCp($codePostal)
{
   // Le code postal doit comporter 5 chiffres
   return strlen($codePostal)== 5 && estEntier($codePostal);
}

// Si la valeur transmise ne contient pas d'autres caractères que des chiffres,
// la fonction retourne vrai
function estEntier($valeur)
{
   return !preg_match ("/^[^0-9]./", $valeur);
}
function estUnMail($mail)
{
$regexp="/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
return preg_match ($regexp, $mail);
}
function getErreursSaisieCommande($cp,$mail)
{
 $lesErreurs = array();
 if(!estUnCp($cp))
 	$lesErreurs[]= "erreur de code postal";
 if(!estUnMail($mail))
 	$lesErreurs[]= "erreur de mail";
 return $lesErreurs;
}

function enregAdmin()
{
	$_SESSION['admin']=1;
}
function estAdmin()
{
	if (isset($_SESSION['admin'])){
		return true;                
        }
	else {
		return false;
        }
}

function getErreursAdmin($nom,$mdp)
{
	$msgErreurs = array ();
 if(!leNom($nom)){
	$msgErreurs[]="erreur sur le pseudo !";
 }
 if(!lemdp($mdp)){
  $msgErreurs[]="erreur sur le mot de passe !";
 }

}

function estPrix($valeur)
{
   return preg_match ("/^(-)?[0-9]+([.][0-9]+)?$/", $valeur);
}

?>
