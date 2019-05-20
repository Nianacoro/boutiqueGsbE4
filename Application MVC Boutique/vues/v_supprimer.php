<?php
echo "Voulez vous vraiment supprimer?<br>";
echo "<input type='button' id='btn1' value='Oui'><input type='button' id='btn2' value='Non'>";
$id = $_REQUEST['medicament'];
echo "<input type='hidden' id='id' value=".$id.">";
echo "<script>";
echo "var btn1 = document.getElementById('btn1')
      var btn2 = document.getElementById('btn2')
      var idP = document.getElementById('id')
      btn1.addEventListener('click', oui)
      btn2.addEventListener('click', non)
      function oui(){
      document.location = 'http://localhost/php/poly7_MVC/util/supprimer.php?id='+idP.value
      }
      function non(){
      document.location = 'http://localhost/php/poly7_MVC/index.php?uc=administrer&action=categorie'
      }";
echo "</script>";
?>
