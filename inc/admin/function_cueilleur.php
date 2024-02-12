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
?>