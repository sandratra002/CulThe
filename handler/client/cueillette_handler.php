<?php
    require("../../inc/functions.php");
    $mode = null;
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(isset($_POST['parcelle']) && isset($_POST['cueilleur']) && isset($_POST['date_cueillete']) && isset($_POST['poids']) && $mode == null){
        $parcel = $_POST['parcelle'];
        $cueilleur = $_POST['cueilleur'];
        $date_cueillete = $_POST['date_cueillete'];
        $poids = $_POST['poids'];
        try {
            insert_cueillette($cueilleur,$parcel,$date_cueillete,$poids);
            echo("insertion successful :) ");
        } catch (\Throwable $th) {
            echo ("An error has occured :( ");
            echo $th->getMessage();
        }
        // header("Location: ../../pages/client/main.php?page=cueillettes");
    }
    else{
        echo ("An error has occured :( ");
        // header("Location: ../../pages/client/main.php?page=cueillettes");
    }
?>