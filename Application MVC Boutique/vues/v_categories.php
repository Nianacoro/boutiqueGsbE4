<ul id="categories">
<?php
foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie->getId();
	$libCategorie = $uneCategorie->getLibelle();
	$url ="<a href=index.php?uc=voirMedicaments&idCategorie=$idCategorie&action=voirMedicaments> $libCategorie </a>";
	echo "<li>".$url."</li>\n";
}
?>
</ul>
