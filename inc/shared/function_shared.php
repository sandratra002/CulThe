<?php  
    function login($username, $mdp, $type = 1){
        $request = "SELECT id FROM culthe_user WHERE username='%s' AND mdp=sha1('%s') AND id_type=%s";
        $request = sprintf($request,$username,$mdp,$type);
        $temp = mysqli_query(dbconnect(),$request);
        $result = null;
        if(mysqli_num_rows($temp) == 0){
            return null;
        }else{
            $result = mysqli_fetch_assoc($temp);
        }
        mysqli_free_result($temp);
        return $result;
    }

    function get_restant_parcelle_par_date($date,$id_parcelle){
        $request = "SELECT restant FROM v_culthe_parcelle_restant WHERE YEAR('%s')=year AND MONTH('%s')=month AND id_parcelle=%s";
        $request = sprintf($request,$date,$date,$id_parcelle);
        $temp = mysqli_query(dbconnect(),$request);
        $result = null;
        if(mysqli_num_rows($temp) != 0){
            $result = mysqli_fetch_array($temp);
        }
        mysqli_free_result($temp);
        return $result;
    }
?>