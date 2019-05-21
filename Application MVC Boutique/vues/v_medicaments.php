<head>
    <link href="util/css/bootstrap.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" /> 
  </head>

<div id="medicaments">
<?php
echo "<table><br>";
foreach( $lesMedicaments as $unMedicament) 
{
	$id = $unMedicament->getId();
	$libelle = $unMedicament->getLibelle();
	$prix = $unMedicament->getPrix();
	$image = $unMedicament->getImage();
	echo "<form method='POST' action='index.php?uc=voirMedicaments&idCategorie=$idCategorie&idMedicament=$id&action=voirMedicamentsEtAjouterAuPanier'>";
	echo "<tr>
			<td width=150><img src='$image' alt='image' width='100'	height='100'/></td>
			<td width=150 $libelle</td>
			<td width=100> Prix : $prix.euros €</td>
			<td width=300> Quantite :<input type='text'  name='quantite' value ='1' size='2' />
                        <input type='submit' value='Commander' class='btn btn-success'  /></td>";
	echo '</tr>';
        echo "</form>";
}
?>
</table>
</div>
