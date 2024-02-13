<?php
    function get_all_info_parcelle(){
        $request = "SELECT * FROM v_culthe_info_parcelle";
        $temp = mysqli_query(dbconnect(),$request);
        $result = array();
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function insert_parcelle($numero,$surface,$id_variete_the){
        $request = "INSERT INTO culthe_parcelle VALUES(NULL,%d,%d,%d,%d)";
        $occupation = get_occupation_variete_the_by_id($id_variete_the);
        $nb_pieds = round(($surface * 10000)/$occupation['occupation']);
        $request = sprintf($request,$numero,$surface,$nb_pieds,$id_variete_the);
        mysqli_query(dbconnect(),$request);
    }

    function get_restant_parcelle_par_date($date,$id_parcelle){
        $request = "SELECT restant FROM v_culthe_parcelle_restant WHERE YEAR('%s')=year AND MONTH('%s')=month AND id_parcelle=%s";
        $request = sprintf($request,$date,$date,$id_parcelle);
        $temp = mysqli_query(dbconnect(),$request);
        $result = null;
        if(mysqli_num_rows($temp) != 0){
            $result = mysqli_fetch_array($temp);
        }
        mysqli_free_result($temp);
        return $result;
    }

    function get_restant_parcelle_by_id($id){
        $request = "SELECT restant FROM v_culthe_parcelle_restant WHERE id=".$id;
        $temp = mysqli_query($request);
        $result = null;
        if(mysqli_num_rows($temp) != 0){
            $result = mysqli_fetch_array($temp);
        }
        mysqli_free_result($temp);
        return $result;
    }

    function delete_parcelle_by_id($id){
        $request = "DELETE FROM culthe_parcelle WHERE id=%s";
        $request = sprintf($request,$id);
        mysqli_query(dbconnect(),$request);
    }

    function update_parcelle($id,$numero,$surface,$id_variete_the){
        $request = "UPDATE culthe_parcelle SET numero=%s, surface=%s,id_variete_the=%s WHERE id=%s";
        $request = sprintf($request,$numero,$surface,$id_variete_the,$id);
        mysqli_query(dbconnect(),$request);
    }

    // function get_montant_vente($id_parcelle){
    //     $request = "SELECT * FROM v_culthe_montant_vente WHERE id=".$id_parcelle;
    //     $temp = mysqli_query(dbconnect(),$request);
    //     $result = mysqli_fetch_array($temp);
    //     mysqli_free_result($temp);
    //     return $result;
    // }
    
    function get_rendement_par_parcelle($id){
        $request = "SELECT rendement_par_mois FROM v_culthe_info_parcelle WHERE id_parcelle=%s";
        $request = sprintf($request, $id);
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

    function get_surface_par_parcelle($id){
        $request = "SELECT surface_parcelle FROM v_culthe_info_parcelle WHERE id_parcelle=%s";
        $request = sprintf($request, $id);
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

    function regenerate_parcelle_by_id($id){
        $request1 = "SELECT id_variete_the FROM culthe_parcelle WHERE id=".$id;
        $id_variete = mysqli_query(dbconnect(),$request1);
        $id_variete_the = mysqli_fetch_assoc($id);
        $occupation = get_occupation_variete_the_by_id($id_variete_the['id_variete_the']);
        $surface = get_surface_par_parcelle($id);
        $nombre_pieds = round(($surface['surface_parcelle'] * 1000)/$occupation);
        $request2 = "UPDATE culthe_parcelle SET nombre_pieds=".$nombre_pieds." WHERE id=".$id;
        mysqli_query(dbconnect(),$request2);
    }
?>