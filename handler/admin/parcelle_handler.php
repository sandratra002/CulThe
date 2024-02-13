<?php
    require("../../inc/functions.php");
    if(!isset($_SESSION['user']) || $_SESSION['user']['id_type'] != 1){
        header("Location: ../../pages/admin/index.php");
    }
    $mode = null;
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(isset($_POST['numero']) && isset($_POST['surface']) && isset($_POST['variete']) && $mode == null){
        $numero = $_POST['numero'];
        $surface = $_POST['surface'];
        $variete = $_POST['variete'];
        insert_parcelle($numero,$surface,$variete);
        echo("insertion successful :) ");
        header("Location: ../../pages/admin/main.php?page=parcelle");
    }else if($mode == "u"){
        $id = $_POST["id"];
        $numero = $_POST["numero"];
        $surface = $_POST["surface"];
        $variete = $_POST["variete"];
        update_parcelle($id,$numero,$surface, $variete);
        echo ("Update succesful");
    }else if($mode == "d"){
        $id = $_POST["id"];
        delete_parcelle_by_id($id);
        echo ("Delete succesful");
    }
    else{
        echo ("An error has occured :( ");
    }
?>