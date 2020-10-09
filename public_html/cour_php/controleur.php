<?php
require_once './fonctions_france.inc.php';
$commande = $_GET['commande'];

switch ($commande)
{
    case'getDepartementFromVille':
        $ville=$_GET['ville'];
        $nomDepartement = getNomDepartementFromVille($ville);
        header('Content-Types: application/json');
        echo json_encode($nomDepartement);
        break;
}