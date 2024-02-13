<?php
    function get_all_info_cueilleur(){
        $request = "SELECT * FROM v_culthe_info_cueilleur";
        $temp = mysqli_query(dbconnect(),$request);
        $result = [];
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result;
    }

    function insert_cueilleur($nom,$id_genre,$date_naissance,$prix_minimal,$bonus,$malus){
        $request = "INSERT INTO culthe_cueilleur VALUES(NULL,'%s',%s,'%s',%s,%s,%s)";
        $request = sprintf($request,$nom,$id_genre,$date_naissance,$prix_minimal,$bonus,$malus);
        mysqli_query(dbconnect(),$request);
    }

    function delete_cueilleur_by_id($id){
        $request = "DELETE FROM culthe_cueilleur WHERE id=%s";
        $request = sprintf($request,$id);
        mysqli_query(dbconnect(),$request);
    }

    function update_cueilleur($id,$nom,$id_genre,$date_naissance){
        $request = "UPDATE culthe_cueilleur SET nom='%s', id_genre=%s,date_naissance='%s' WHERE id=%s";
        $request = sprintf($request,$nom,$id_genre,$date_naissance,$id);
        mysqli_query(dbconnect(),$request);
    }

    function get_cueilleur_by_id($id){
        $request = "SELECT * FROM v_culthe_info_cueilleur WHERE id= %s";
        $request = sprintf($request,$id);
        echo $request;
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

    function get_paiement_cueilleur($date){
        $request = "SELECT * FROM v_culthe_paiement_cueilleur WHERE date_cueillette='%s'";
        $request = sprintf($request,$date);
        $temp = mysqli_query(dbconnect(),$request);
        $result = [];
        while($donne = mysqli_fetch_array($temp)){
            $result[] = $donne;
        }
        mysqli_free_result($temp);
        return $result; 
    }

    function get_total_paiement_cueilleur($date){
        $list = get_paiement_cueilleur($date);
        $result = array();
        for($i=0; $i<count($list); $i++){
            $temp = array(
                "date" => $list[$i]['date_cueillette'],
                "nom" => $list[$i]['nom'],
                "bonus" => $list[$i]['bonus'],
                "malus" => $list[$i]['malus'],
                "poids_minimal" => $list[$i]['poids_minimal'],
                "poids_cueilli" => $list[$i]['poids_cueilli'],
                "montant" => $list[$i]['montant']
            );
            $result[] = $temp;
        }
        echo json_encode($result);
    }

    function get_list_paiement_cueilleur($date_debut,$date_fin){
        $list = array();
        while($date_debut <= $date_fin){
            $list[] = get_total_paiement_cueilleur($date_debut);
            $date_debut = date('Y-m-d',strtotime($date_debut.'+ 1 days'));
            echo "Date debut : ".$date_debut;
        }
        echo json_encode($list);
    }
?>