<?php
include("fonctions.php");
ajouter($_POST["id"], $_POST["nom"], $_POST["prix"], $_POST["photo"], $_POST['categorie']);
header("location:../index.php?uc=administrer&action=categorie");
?>
