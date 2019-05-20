<div id="medicaments">
<?php
echo "<table>";
foreach( $lesMedicaments as $unMedicament) 
{
	$id = $unMedicament->getId();
	$libelle = $unMedicament->getLibelle();
	$prix = $unMedicament->getPrix();
	$image = $unMedicament->getImage();
        echo "<form method='POST' action='index.php?uc=voirMedicaments&idCategorie=$idCategorie&idMedicament=$id&action=voirMedicamentsEtAjouterAuPanier'>";
	echo "<tr>
			<td width=150><img src='$image' alt='image' width='100'	height='100' /></td>
			<td width=100>$libelle</td>
			<td width=100>$prix</td>
			<td width=300> Quantite :<input type='text' name='quantite' value ='1' size='2' />
                        <input type='submit' value='Commander'  /></td>";
	echo '</tr>';
        echo "</form>";
}
?>
</table>
</div>
