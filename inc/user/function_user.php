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
?>