<?php
    function get_all_info_parcelle(){
        $request = "SELECT * FROM v_culthe_info_parcelle";
        $temp = mysqli_query(dbconnect(),$request);
        $result = [];
        while($donne = mysqli_fetch_array($temp)){
            $result = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function insert_parcelle($numero,$surface,$id_variete_the){
        $request = "INSERT INTO culthe_parcelle VALUES(%s,%s,%s)";
        $request = sprintf($request,$numero,$surface,$id_variete_the);
        mysqli_query(dbconnect(),$request);
    }

?>