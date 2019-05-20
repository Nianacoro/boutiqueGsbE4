<?php
$nbMedicament = getNbMedicament();
$nbMedicament = $nbMedicament['idMedicament'] + 1;
echo "<form action='util/ajouter.php' method='post'>";
echo "<input type='hidden' name='id' value=".$nbMedicament.">";
echo "<input type='hidden' name='categorie' value=".$_REQUEST['idCategorie'].">";
echo "Nom du medicament :";
echo "<input type='text' name='nom' size='50'><br>";
echo "Prix du medicament :";
echo "<input type='number' name='prix'><br>";
echo "Photo du medicament :";
echo "<input type='file' name='photo'><br>";
echo "<input type='submit' value='Valider'><br>";
echo "</form>";
?>
