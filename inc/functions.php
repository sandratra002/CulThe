<?php
    require("connexion.php");
    require("shared/function_shared.php");
    require("user/function_user.php");
    require("admin/function_parcelle.php");
    require("admin/function_variete_the.php");
    require("admin/function_cueilleur.php");
    require("admin/function_categorie_depense.php");
    require("admin/function_salaire.php");

    $cue = get_restant_parcelle_par_date("2024-2-1",2);
    var_dump($cue);
?>