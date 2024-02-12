<?php
    require("../../inc/functions.php");
    if(isset($_POST['expense_label']) && $_POST['expense_label'] != null){
        $label = $_POST['expense_label'];
        insert_categorie_depense($label);
        echo("insertion successful :) ");
    }else{
        echo ("An error has occured :( ");
    }
?>