<?php
    function get_all_variete_the(){
        $request = "SELECT * FROM culthe_variete_the";
        $temp = mysqli_query(dbconnect(),$request);
        $result = [];
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function insert_variete_the($nom,$occupation,$rendement){
        $request = "INSERT INTO culthe_variete_the VALUES(NULL,'%s',%s,%s)";
        $request = sprintf($nom,$occupation,$rendement);
        mysqli_query(dbconnect(),$request);
    }

    function update_variete_the($id,$nom,$occupation,$rendement){
        $request = "UPDATE culthe_variete_the SET nom='%s', occupation=%s,rendement=%s WHERE id=%s";
        $request = sprintf($request,$nom,$occupation,$rendement,$id);
        mysqli_query(dbconnect(),$request);
    }
    
    function delete_variete_the_by_id($id){
        $chk = "SET foreign_key_checks = 0";
        mysqli_query(dbconnect(),$chk);
        $request = "DELETE FROM culthe_variete_the WHERE id=%s";
        $request = sprintf($request,$id);
        echo $request;
        mysqli_query(dbconnect(),$request);
        $chk = "SET foreign_key_checks = 1";
        mysqli_query(dbconnect(),$chk);
        echo "delete fait";
    }

    function get_occupation_variete_the_by_id($id){
        $request = "SELECT occupation FROM culthe_variete_the WHERE id=%s";
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