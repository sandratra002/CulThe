<?php
    function get_all_info_salaire(){
        $request = "SELECT * FROM v_culthe_info_salaire";
        $temp = mysqli_query(dbconnect(),$request);
        $result = [];
        while($donne = mysqli_fetch_array($temp)){
            $result = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function insert_salaire($id_cueilleur,$montant){
        $request = "INSERT INTO culthe_salaire VALUES(NULL,%s,%s)";
        $request = sprintf($request,$id_cueilleur,$montant);
        mysqli_query(dbconnect(),$request);
    }

    function delete_salaire_by_id($id){
        $request = "DELETE FROM culthe_salaire WHERE id=%s";
        $request = sprintf($request,$id);
        mysqli_query(dbconnect(),$request);
    }

    function update_salaire($id,$id_cueilleur,$montant){
        $request = "UPDATE culthe_salaire SET id_cueilleur='%s', montant=%s WHERE id=%s";
        $request = sprintf($request,$id_cueilleur,$montant,$id);
        mysqli_query(dbconnect(),$request);
    }
?>