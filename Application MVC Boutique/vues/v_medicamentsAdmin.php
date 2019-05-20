<div id="medicaments">
  <?php
  echo "</td><td>";
foreach( $lesMedicaments as $unMedicament) 
  {
    $id = $unMedicament->getId();
  $libelle= $unMedicament->getLibelle();
  $image = $unMedicament->getImage();
  $prix = $unMedicament->getPrix();
  $modif ="<a href=c_modifMedicament.php?idCategorie=$idCategorie&medicament=$id&action=modification>modifier</a>";
  $suppr ="<a href=c_modifMedicament.php?idCategorie=$idCategorie&medicament=$id&action=supprimer>supprimer</a>";
  echo "<ul>
	<li><img src='".$image."' alt='image' width='100px' height='100px' /></li>
	<li>$libelle</li>
  <li>$prix</li>
  <li>$modif</li>
  <li>$suppr</li>
	</ul>
	";
}
echo "<a href=c_modifMedicament.php?idCategorie=$idCategorie&action=ajouter>Ajouter</a><td>";
?>
</div>
