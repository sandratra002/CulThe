<?php
    require("connexion.php");
    require("shared/function_shared.php");
    require("user/function_user.php");
    require("admin/function_parcelle.php");
    require("admin/function_variete_the.php");
    require("admin/function_cueilleur.php");
    require("admin/function_categorie_depense.php");
    require("admin/function_salaire.php");

    get_list_paiement_cueilleur('2023-12-10','2023-12-11');
?>