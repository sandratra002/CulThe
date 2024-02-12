<?php
    function get_user_by_id($id){
        $request = "SELECT * FROM v_culthe_info_user WHERE id= %s";
        $request = sprintf($request,$id);
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

    function insert_cueillette($id_cueilleur,$id_parcelle,$date_cueillette,$poids_cueilli){
        $request = "INSERT INTO culthe_cueillette VALUES(NULL,%s,%s,'%s',%s)";
        $request = sprintf($request,$id_cueilleur,$id_parcelle,$date_cueillette,$poids_cueilli);
        mysqli_query(dbconnect(),$request);
    }

    function insert_depense($id_categorie_depense,$date,$montant){
        $request = "INSERT INTO culthe_depense VALUES(NULL,%s,%s,%d)";
        $request = sprintf($request,$id_categorie_depense,$montant,$date);
        echo($request);
        mysqli_query(dbconnect(),$request);
    }
?>