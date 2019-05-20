<ul id="categories">
<?php
foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie->getId();
	$libCategorie = $uneCategorie->getLibelle();
	$url ="<a href=index.php?uc=administrer&idCategorie=$idCategorie&action=voirMedicaments> $libCategorie </a>";
	echo "<li>".$url."</li>\n";
}
?>
</ul>
