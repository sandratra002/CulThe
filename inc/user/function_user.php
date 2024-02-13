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

    function get_all_genre(){
        $request = "SELECT * FROM culthe_genre";
        $temp = mysqli_query(dbconnect(),$request);
        $result = array();
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function insert_cueillette($id_cueilleur,$id_parcelle,$date_cueillette,$poids_cueilli){
        $request = "INSERT INTO culthe_cueillette VALUES(NULL,%s,%s,'%s',%s)";
        $poids = $poids_cueilli * get_rendement_par_parcelle($id_parcelle);
        $request = sprintf($request,$id_cueilleur,$id_parcelle,$date_cueillette,$poids);
        mysqli_query(dbconnect(),$request);
        $request1 = "UPDATE culthe_parcelle SET nombre_pieds=nombre_pieds-%s";
        $request1 = sprintf($request1,$poids_cueilli);
        mysqli_query(dbconnect(),$request1);
    }

    function get_all_cueillette(){
        $request = "SELECT * FROM culthe_cueillette";
        $temp = mysqli_query(dbconnect(),$request);
        $result = array();
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function get_all_depense(){
        $request = "SELECT * FROM v_culthe_info_depense";
        $temp = mysqli_query(dbconnect(),$request);
        $result = array();
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function insert_depense($id_categorie_depense,$montant,$date){
        $request = "INSERT INTO culthe_depense VALUES(NULL,%s,%s,'%s')";
        $request = sprintf($request,$id_categorie_depense,$montant,$date);
        echo($request);
        mysqli_query(dbconnect(),$request);
    }
?>