<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <link href="util/css/bootstrap.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" /> 
  </head>

<div id = categories>
<?php
echo "<h4><span class='label label-success'>Categories d'Antibiotiques:</span></h4><br>
";
foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie->getId();
	$libCategorie = $uneCategorie->getLibelle();
	$url ="<a href=index.php?uc=voirMedicaments&idCategorie=$idCategorie&action=voirMedicaments> $libCategorie </a>";
 
 echo "<li><h3>".$url."</h3></li>"; 

}
?>
</div>

