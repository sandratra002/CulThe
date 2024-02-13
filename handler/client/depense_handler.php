<?php
    require("../../inc/functions.php");
    if(isset($_POST['categorie']) && isset($_POST['montant']) && isset($_POST['date_depense'])){
        $categorie = $_POST['categorie'];
        $montant = $_POST['montant'];
        $date_depense = $_POST['date_depense'];
        insert_depense($categorie,$montant,$date_depense,$date_depense);
        echo("insertion successful :) ");
        //header("Location: ../../pages/admin/main.php?page=categoriele");
    }
    else{
        echo ("An error has occured :( ");
    }
?>