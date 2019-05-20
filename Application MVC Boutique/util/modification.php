<?php
include("fonctions.php");
modification($_POST["id"], $_POST["libelle"], $_POST["prix"]);
header("location:../index.php?uc=administrer&action=categorie");
?>
