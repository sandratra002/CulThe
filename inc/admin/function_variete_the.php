<?php

    function get_all_variete_the(){
        $request = "SELECT * FROM culthe_variete_the";
        $temp = mysqli_query(dbconnect(),$request);
        $result = [];
        while($donne = mysqli_fecth_array($temp)){
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


?>