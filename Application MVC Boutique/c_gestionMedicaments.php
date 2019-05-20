<?php
$action = $_REQUEST["action"];
switch ($action)
{
  case 'identification':
  include("vues/v_login.php");
  break;
  
  case 'testIdentification':
  include("vues/v_login.php");
  $admin = verifLogin($_REQUEST["login"], $_REQUEST["mdp"]);
  if ($admin == null)
  {
    $err = 2;
    include ("vues/v_erreurs.php");
  }
  else
  {
    header("location:index.php?uc=administrer&action=categorie");
  }
  break;
  
  case 'categorie':
  $lesCategories = getLesCategories();
  include("vues/v_categoriesAdmin.php");
  break;
  
  case 'voirMedicaments':
  $lesCategories = getLesCategories();
  include("vues/v_categoriesAdmin.php");
  $idCategorie = $_REQUEST['idCategorie'];
  $lesMedicaments = getLesMedicaments($idCategorie);
  include("vues/v_medicamentsAdmin.php");
  break;
}
?>