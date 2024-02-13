<?php
session_start();
session_destroy();
header('Location:../../pages/client/index.php');
?>