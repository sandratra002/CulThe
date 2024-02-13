<?php
    require("../../inc/functions.php");
    $mode = null;
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(isset($_POST['expense_label']) && $_POST['expense_label'] != null){
        $label = $_POST['expense_label'];
        insert_categorie_depense($label);
        header("Location: ../../pages/admin/main.php?page=depense");
        echo("insertion successful :) ");
    }else if($mode == "u"){
        $libelle = $_POST["libelle"];
        $id = $_POST["id"];
        update_categorie_depense($id, $libelle);
        echo ("Update succesful");
    }else if($mode == "d"){
        $id = $_POST["id"];
        delete_categorie_depense_by_id($id);
        echo ("Delete succesful");
    }
    else{
        echo ("An error has occured :( ");
    }
?>