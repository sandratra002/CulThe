<?php
    require("../../inc/functions.php");
    session_start();
    $mode = null;
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(isset($_POST['nom']) && isset($_POST['birthday']) && isset($_POST['genre']) && isset($_POST['poid_minimal']) && isset( $_POST['bonus_superieur']) && isset($_POST['bonus_inferieur']) && $mode == null){
        $nom = $_POST['nom'];
        $date_naissance = $_POST['birthday'];
        $genre = $_POST['genre'];
        $poidMinimal = $_POST['poid_minimal'];
        $bonusSup = $_POST['bonus_superieur'];
        $bonusInf = $_POST['bonus_inferieur'];
        insert_cueilleur($nom,$genre,$date_naissance,$bonusSup,$bonusInf,$poidMinimal);
        echo("insertion successful :) ");
        header("Location: ../../pages/admin/main.php?page=cueilleur");
    }else if($mode == "u"){
        $nom = $_POST["nom"];
        $id = $_POST["id"]; 
        $birthday = $_POST["birthday"];
        $genre = $_POST["genre"];
        $poidMinimal = $_POST['poid_minimal'];
        $bonusSup = $_POST['bonus_superieur'];
        $bonusInf = $_POST['bonus_inferieur'];
        update_cueilleur($id,$nom,$genre, $birthday , $bonusSup , $bonusInf , $poidMinimal);
        echo ("Update succesful");
    }else if($mode == "d"){
        $id = $_POST["id"];
        delete_cueilleur_by_id($id);
        echo ("Delete succesful");
    }
    else{
        echo ("An error has occured :( ");
    }
?>