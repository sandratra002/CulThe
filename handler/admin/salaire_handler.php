<?php
    require("../../inc/functions.php");
    if(isset($_POST['cueilleur']) && isset($_POST['salaire'])){
        $cueilleur = $_POST['cueilleur'];
        $salaire = $_POST['salaire'];
        insert_salaire($cueilleur,$salaire);
        echo("insertion successful :) ");
    }else{
        echo ("An error has occured :( ");
    }
?>