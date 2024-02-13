<?php
    require("../../inc/functions.php");
    if(isset($_POST['parcel']) && isset($_POST['cueilleur']) && isset($_POST['date_cueillete']) && isset($_POST['poids']) && $mode == null){
        $parcel = $_POST['parcel'];
        $cueilleur = $_POST['cueilleur'];
        $date_cueillete = $_POST['date_cueillete'];
        $poids = $_POST['poids'];
        insert_cueillette($cueilleur,$parcel,$date_cueillete,$poids);
        echo("insertion successful :) ");
        header("Location: ../../pages/client/main.php?page=cueillette");
    }
    else{
        echo ("An error has occured :( ");
    }
?>