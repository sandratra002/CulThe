<?php
    function dbconnect(){
        static $connect = null;
        if ($connect===null) {
<<<<<<< HEAD
            $connect = mysqli_connect('localhost','root','','culthe');
=======
            $connect = mysqli_connect('localhost','Sanda','DashDashGo2K23!!','culthe');
>>>>>>> 4301da680050f1507e5b7d7c55caec19600fd0e4
        }
        return $connect;
    }
