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
        $request = "INSERT INTO culthe_parcelle VALUES(NULL,%d,%d,%d)";
        $request = sprintf($request,$numero,$surface,$id_variete_the);
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
?>