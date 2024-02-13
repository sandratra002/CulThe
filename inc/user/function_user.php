<?php
    function get_user_by_id($id){
        $request = "SELECT * FROM v_culthe_info_user WHERE id= %s";
        $request = sprintf($request,$id);
        $temp = mysqli_query(dbconnect(),$request);
        $result = null;
        if(mysqli_num_rows($temp) == 0){
            return null;
        }else{
            $result = mysqli_fetch_array($temp);
        }
        mysqli_free_result($temp);
        return $result;
    }   

    function get_all_genre(){
        $request = "SELECT * FROM culthe_genre";
        $temp = mysqli_query(dbconnect(),$request);
        $result = array();
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function insert_cueillette($id_cueilleur,$id_parcelle,$date_cueillette,$poids_cueilli){
        mysqli_autocommit(dbconnect(),false);
        $request = "INSERT INTO culthe_cueillette VALUES(NULL,%s,%s,'%s',%s)";
        $p = get_rendement_par_parcelle($id_parcelle);
        $piedRestant = get_restant_parcelle_by_id($id_parcelle);
        $poids = $piedRestant * $p['rendement_par_mois'];
        if($poids > $poids_cueilli){
            mysqli_rollback(dbconnect());
            throw new Exception("Error while checking", 1);
        }
        $request = sprintf($request,$id_cueilleur,$id_parcelle,$date_cueillette,$poids);
        mysqli_query(dbconnect(),$request);
        $request1 = "UPDATE culthe_parcelle SET nombre_pieds=nombre_pieds-%s";
        $request1 = sprintf($request1,$poids_cueilli);
        mysqli_query(dbconnect(),$request1);
    }

    function get_all_cueillette(){
        $request = "SELECT * FROM culthe_cueillette";
        $temp = mysqli_query(dbconnect(),$request);
        $result = array();
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function get_all_depense(){
        $request = "SELECT * FROM v_culthe_info_depense";
        $temp = mysqli_query(dbconnect(),$request);
        $result = array();
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function insert_depense($id_categorie_depense,$montant,$date){
        $request = "INSERT INTO culthe_depense VALUES(NULL,%s,%s,'%s')";
        $request = sprintf($request,$id_categorie_depense,$montant,$date);
        echo($request);
        mysqli_query(dbconnect(),$request);
    }

    function get_restant_par_parcelle($date){
        $request = "SELECT * FROM v_culthe_parcelle_restant WHERE year=YEAR('%s') AND month=MONTH('%s')";
        $request = sprintf($request,$date,$date);
        $temp = mysqli_query(dbconnect(),$request);
        $result = array();
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function get_total_cueillete($dateDebut,$dateFin){
        $request = "SELECT * FROM v_culthe_info_cueillette WHERE date_cueillette >='%s' AND date_cueillette <='%s'";
        $request = sprintf($request,$dateDebut,$dateFin);
        $temp = mysqli_query(dbconnect(),$request);
        $result = array();
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function get_prix_cueillette($dateDebut,$dateFin){
        $request = "SELECT * FROM v_culthe_info_cueillette_prix WHERE date_cueillette >='%s' AND date_cueillette <='%s'";
        $request = sprintf($request,$dateDebut,$dateFin);
        $temp = mysqli_query(dbconnect(),$request);
        $result = array();
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function get_all_depense_by_date($dateDebut,$dateFin){
        $request = "SELECT * FROM v_culthe_info_depense WHERE date_depense >='%s' AND date_depense <='%s'";
        $request = sprintf($request,$dateDebut,$dateFin);
        $temp = mysqli_query(dbconnect(),$request);
        $result = array();
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function get_total_poids_cueilli($date_debut,$date_fin){
        $total = 0;
        $cueillette = get_total_cueillete($date_debut,$date_fin);
        for($i=0; $i<count($cueillette); $i++){
            $total += $cueillette[$i]['somme'];
        }
        return $total;
    }

    function get_prix_revient_par_kilo($date_debut,$date_fin){
        $revient = 0;
        $result = 0;
        $depense = get_all_depense_by_date($date_debut,$date_fin);
        $prix = get_prix_cueillette($date_debut,$date_fin);
        for($i=0; $i<count($depense); $i++){
            $revient += $depense[$i]['montant'];
        }
        for($i=0; $i<count($prix); $i++){
            $revient += $prix[$i]['montant'];
        }
        $cueilli = get_total_poids_cueilli($date_debut,$date_fin);
        if($revient != 0 && $cueilli){
            $result = round($revient/$cueilli);
        }
        return $result;
    }

    
?>