<?php
    require("../../inc/functions.php");
    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $selectedMonth = array();
    $mode = null;
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
   
    if(isset($_POST['nom']) && isset($_POST['occupation']) && isset($_POST['rendement']) && $mode == null ){
        $nom = $_POST['nom'];
        $occupation = $_POST['occupation'];
        $rendement = $_POST['rendement'];
        $prixVente = $_POST['prix_vente'];
        for ($i=0; $i < 12; $i++) { 
           if(isset($months[$i])){
                $selectedMonth[] = $months[$i];
           }
        }
        insert_variete_the($nom,$occupation,$rendement , $prixVente);
        header("Location: ../../pages/admin/main.php?page=the");
        echo("insertion successful :) ");
    }else if($mode == "u"){
        $id = $_POST["id"];
        $nom = $_POST['nom'];
        $occupation = $_POST['occupation'];
        $rendement = $_POST['rendement'];
        update_variete_the($id,$nom,$occupation, $rendement);
        echo ("Update successful");
    }else if($mode == "d"){
        $id = $_POST["id"];
        delete_variete_the_by_id($id);
        echo ("Delete successful");
    }
    else{
        echo ("An error has occured :( ");
    }
?>