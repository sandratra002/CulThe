<?php
    function dbconnect(){
        static $connect = null;
        if ($connect===null) {
            $connect = mysqli_connect('localhost','Sanda','DashD ashGo2K23!!','culthe');
        }
        return $connect;
    }
?>