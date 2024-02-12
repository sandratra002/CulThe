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

    function insert_categorie_depense($libelle){
        $request = "INSERT INTO culthe_categorie_depense VALUES(NULL,%d)";
        $request = sprintf($request,$libelle);
        echo $request;
        mysqli_query(dbconnect(),$request);
    }
?>