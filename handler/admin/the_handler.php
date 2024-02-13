<?php
    require("../../inc/functions.php");
    if(!isset($_SESSION['user']) || $_SESSION['user']['id_type'] != 1){
        header("Location: ../../pages/admin/index.php");
    }
    $mode = null;
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(isset($_POST['nom']) && isset($_POST['occupation']) && isset($_POST['rendement']) && $mode == null){
        $nom = $_POST['nom'];
        $occupation = $_POST['occupation'];
        $rendement = $_POST['rendement'];
        insert_variete_the($nom,$occupation,$rendement);
        header("Location: ../../pages/admin/main.php?page=the");
        echo("insertion successful :) ");
    }else if($mode == "u"){
        $id = $_POST["id"];
        $nom = $_POST['nom'];
        $occupation = $_POST['occupation'];
        $rendement = $_POST['rendement'];
        update_variete_the($id,$nom,$occupation, $rendement);
        echo ("Update succesful");
    }else if($mode == "d"){
        $id = $_POST["id"];
        delete_variete_the_by_id($id);
        echo ("Delete succesful");
    }
    else{
        echo ("An error has occured :( ");
    }
?>