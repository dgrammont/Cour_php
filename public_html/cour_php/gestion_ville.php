
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Formulaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <?php
      require_once './fonctions_france_inc.php';
      $nomVille=$_POST['ville'];
      $nomDepartement= getNomDepartementFromVille($nomVille);
     // $nomRegion=afficheRegions($nomVille);
      echo "<div>";
      echo "ville de <b>$nomVille</b> se trouve dans le département : <br/>";
      echo "<b>$nomDepartement</b> dans la region de <b>$nomRegion</b>";
      echo "</div>";
      ?>
        
    </body>
</html>