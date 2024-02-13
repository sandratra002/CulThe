<?php
    require("../../inc/functions.php");
    if(!isset($_SESSION['user']) || $_SESSION['user']['id_type'] != 2){
        header("Location: ../../pages/client/index.php");
    }
    if(isset($_POST['categorie']) && isset($_POST['montant']) && isset($_POST['date_depense'])){
        $categorie = $_POST['categorie'];
        $montant = $_POST['montant'];
        $date_depense = $_POST['date_depense'];
        insert_depense($categorie,$montant,$date_depense);
        echo("insertion successful :) ");
        header("Location: ../../pages/client/main.php?page=depenses");
    }
    else{
        echo ("An error has occured :( ");
    }
?>