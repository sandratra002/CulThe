<?php
    require("../../inc/functions.php");
    if(isset($_POST['nom']) && isset($_POST['occupation']) && isset($_POST['rendement'])){
        $nom = $_POST['nom'];
        $occupation = $_POST['occupation'];
        $rendement = $_POST['rendement'];
        insert_variete_the($nom,$occupation,$rendement);
        echo("insertion successful :) ");
    }else{
        echo ("An error has occured :( ");
    }
?>