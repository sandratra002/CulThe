<?php
    function dbconnect(){
        static $connect = null;
        if ($connect===null) {
            $connect = mysqli_connect('localhost','Sanda','DashDashGo2K23!!','culthe');
        }
        return $connect;
    }
?>