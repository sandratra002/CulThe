<?php
    require("../../inc/functions.php");
    if(isset($_POST['numero']) && isset($_POST['surface']) && isset($_POST['variete'])){
        $numero = $_POST['numero'];
        $surface = $_POST['surface'];
        $variete = $_POST['variete'];
        insert_parcelle($numero,$surface,$variete);
        echo("insertion successful :) ");
    }else{
        echo ("An error has occured :( ");
    }
?>