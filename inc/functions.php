<?php
    require("connexion.php");
    require("shared/function_shared.php");
    require("user/function_user.php");
    require("admin/function_parcelle.php");
    require("admin/function_variete_the.php");
    require("admin/function_cueilleur.php");
    require("admin/function_categorie_depense.php");
    require("admin/function_salaire.php");

    get_total_paiement_cueilleur('2023-2-1');
?>