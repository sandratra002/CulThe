<?php
    require("../../inc/functions.php");
    $debut = $_POST['date_debut'];
    $fin = $_POST['date_fin'];

    $poidTotal = get_total_poids_cueilli($debut , $fin);
    $restant = get_restant_par_parcelle($fin);
    $coutRevient = get_prix_revient_par_kilo($debut , $fin);
    //$montant_vente = get_montant_vente();

    $resutlat = array(
        "poidsTotal" => $poidTotal , 
        "restant" => $restant , 
        "coutRevient" => $coutRevient
    );

    echo json_encode($resutlat);
    //header('Location:../../pages/client/resultat.php');
?>