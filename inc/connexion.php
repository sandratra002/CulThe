<?php
    function dbconnect(){
        static $connect = null;
        if ($connect===null) {
            $connect = mysqli_connect('localhost','root','','culthe');
        }
        return $connect;
    }
