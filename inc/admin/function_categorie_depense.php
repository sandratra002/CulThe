<?php
    function get_all_categorie_depense(){
        $request = "SELECT * FROM culthe_categorie_depense";
        $temp = mysqli_query(dbconnect(),$request);
        $result = [];
        while($donne = mysqli_fetch_array($temp)){
            $result = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }
?>