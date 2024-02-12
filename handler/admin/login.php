<?php
require ("../../inc/functions.php");
session_start();  
$username = $_POST['user_name'];
$password = $_POST['password'];
$header = "";
if($username != null && $password != null){
    $login = login($username , $password) ;
    if( $login == null){
        $_SESSION['error'] = "An error has occured" ; 
        $header .=  "../../pages/admin/index.php";
    }else{
        if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        }
        $_SESSION['user'] = get_user_by_id($login['id']);
        $header .= "";
    }
}else{
    $_SESSION['error'] = "Please fill up all fields"; 
    $header .=  "../../pages/admin/index.php";
}
header('Location:'.$header);

?>