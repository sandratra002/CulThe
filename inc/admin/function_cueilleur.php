<?php
    function get_all_info_cueilleur(){
        $request = "SELECT * FROM v_culthe_info_cueilleur";
        $temp = mysqli_query(dbconnect(),$request);
        $result = [];
        while($donne = mysqli_fetch_array($temp)){
            $result = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function insert_cueilleur($nom,$id_genre,$date_naissance){
        $request = "INSERT INTO culthe_cueilleur VALUES(NULL,%s,%s,%s)";
        $request = sprintf($request,$nom,$id_genre,$date_naissance);
        mysqli_query(dbconnect(),$request);
    }

    function delete_cueilleur_by_id($id){
        $request = "DELETE FROM culthe_cueilleur WHERE id=%s";
        $request = sprintf($request,$id);
        mysqli_query(dbconnect(),$request);
    }

    function update_cueilleur($id,$nom,$id_genre,$date_naissance){
        $request = "UPDATE culthe_parcelle SET nom='%s', id_genre=%s,date_naissance='%s' WHERE id=%s";
        $request = sprintf($request,$nom,$id_genre,$date_naissance,$id);
        mysqli_query(dbconnect(),$request);
    }
?>