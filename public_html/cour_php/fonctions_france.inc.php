<?php

define("SERVEURBD", "172.18.58.7");
define("LOGIN", "snir");
define("MOTDEPASSE", "snir");
define("NOMDELABASE", "france2015");

function connexionBdd() {
    try {
        $pdoOptions = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE, $pdoOptions);
        $bdd->exec("set names utf8");
        return $bdd;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

function getNomDepartementFromVille($ville) {
    try {
        $bdd = connexionBdd();
        $requete = $bdd->prepare("select departement_nom from villes, departements "
                . "where departements.departement_id = villes.ville_departement_id "
                . "and ville_nom like :laville;");
        $requete->bindParam(":laville", $ville);
        $requete->execute() or die(print_r($requete->errorInfos()));

        $nbLigne = $requete->rowCount();

        if ($nbLigne == 0) {
            $nomDep = "pas de département correspondant";
        }
        if ($nbLigne == 1) {
            $nomDep = $requete->fetchColumn(0);
        }
        if ($nbLigne > 1) {
            $nomDep = "";
            while ($ligne = $requete->fetch()) {
                $nomDep = $nomDep . "<br/>" . $ligne['departement_nom'];
            }
        }
        $requete->closeCursor();
        return $nomDep;
    } catch (Exception $ex) {
        print "Erreur !: " . $ex->getMessage() . "<br/>";
        die();
    }
}

////function afficheRegions($Ville) {
////    try {
////        $bdd = connexionBdd();
////        $requete = $bdd->prepare("select region_nom from villes, departements,regions "
////                . "where regions.regions_id=departements.departement_region_id and villes.ville_departement_id=departements.departement_id "
////                . "and ville_nom like :laville ;");
////        $requete->bindParam(":laville", $ville);
////        $requete->execute() or die(print_r($requete->errorInfos()));
////
////        $nbLigne = $requete->rowCount();
////
////
////        if ($nbLigne == 0) {
////            $nomDep = "pas de regions correspondante";
////        }
////        if ($nbLigne == 1) {
////            $nomDep = $requete->fetchColumn(0);
////        }
////        if ($nbLigne > 1) {
////            $nomDep = "";
////            while ($ligne = $requete->fetch()) {
////                $nomDep = $nomDep . "<br/>" . $ligne['nomDept'];
////            }
////        }
////        $requete->closeCursor();
////        return $nomDep;
//    } catch (Exception $ex) {
//        print "Erreur !: " . $ex->getMessage() . "<br/>";
//        die();
//    }
//}