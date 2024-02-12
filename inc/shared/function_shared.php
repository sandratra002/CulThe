<?php  
    function login($username, $mdp){
        $request = "SELECT id FROM culthe_user WHERE username='%s' AND mdp=sha1('%s')";
        $request = sprintf($request,$username,$mdp);
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
?>