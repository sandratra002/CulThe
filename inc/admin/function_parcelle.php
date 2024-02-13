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

    function get_rendement_par_parcelle($id){
        $request = "SELECT rendement_par_mois FROM v_culthe_info_parcelle WHERE id=%s";
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
?>