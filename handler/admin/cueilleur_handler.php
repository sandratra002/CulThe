<?php
    require("../../inc/functions.php");
    session_start();
    $mode = null;
    if(!isset($_SESSION['user']) || $_SESSION['user']['id_type'] != 1){
        header("Location: ../../pages/admin/index.php");
    }
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(isset($_POST['nom']) && isset($_POST['birthday']) && isset($_POST['genre']) && $mode == null){
        $nom = $_POST['nom'];
        $date_naissance = $_POST['birthday'];
        $genre = $_POST['genre'];
        insert_cueilleur($nom,$genre,$date_naissance);
        echo("insertion successful :) ");
        header("Location: ../../pages/admin/main.php?page=cueilleur");
    }else if($mode == "u"){
        $nom = $_POST["nom"];
        $id = $_POST["id"]; 
        $birthday = $_POST["birthday"];
        $genre = $_POST["genre"];
        update_cueilleur($id,$nom,$genre, $birthday);
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