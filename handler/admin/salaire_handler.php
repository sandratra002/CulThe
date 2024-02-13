<?php
    require("../../inc/functions.php");
    $mode = null;
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(isset($_POST['cueilleur']) && isset($_POST['salaire']) && $mode == null){
        $cueilleur = $_POST['cueilleur'];
        $salaire = $_POST['salaire'];
        insert_salaire($cueilleur,$salaire);
        echo("insertion successful :) ");
        header("Location: ../../pages/admin/main.php?page=salaire");
    }else if($mode == "u"){
        $id = $_POST["id"];
        $idUser = $_POST["cueilleur"];
        $salaire = $_POST["salaire"];
        update_salaire($id,$idUser,$salaire);
        echo ("Update succesful");
    }else if($mode == "d"){
        $id = $_POST["id"];
        delete_salaire_by_id($id);
        echo ("Delete succesful");
    }
    else{
        echo ("An error has occured :( ");
    }
?>