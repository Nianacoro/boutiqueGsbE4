<?php
include("fonctions.php");
supprimer($_REQUEST["id"]);
header("location:../index.php?uc=administrer&action=categorie");
?>
