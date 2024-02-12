<?php
    require("../../inc/functions.php");
    if(isset($_POST['nom']) && isset($_POST['birthday']) && isset($_POST['genre'])){
        $nom = $_POST['nom'];
        $date_naissance = $_POST['birthday'];
        $genre = $_POST['genre'];
        insert_cueilleur($nom,$genre,$date_naissance);
        echo("insertion successful :) ");
    }else{
        echo ("An error has occured :( ");
    }
?>