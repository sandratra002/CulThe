<?php
    function dbconnect(){
        static $connect = null;
        if ($connect===null) {
            $connect = mysqli_connect('172.20.0.167','ETU002468','IGUAHu7qSHWS','db_p16_ETU002468');
        }
        return $connect;
    }
