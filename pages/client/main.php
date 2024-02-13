<?php
    require("../../inc/functions.php");
    session_start();
    $include = "resultat.php";
    if(isset($_GET["page"])){
        $include = "../client/" . $_GET["page"] . ".php";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CluThe</title>

    <!-- Libraries -->
    <link rel="stylesheet" href="../../assets/lib/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/lib/fontawesome-free-6.4.2-web/css/fontawesome.css">
    <link rel="stylesheet" href="../../assets/lib/fontawesome-free-6.4.2-web/css/all.css">
    
    <!-- Css stylesheet -->
    <!-- <link rel="stylesheet" href="../../assets/css/sidebar.css"> -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/form.css">
    <link rel="stylesheet" href="../../assets/css/home.css">
    <link rel="stylesheet" href="../../assets/css/layout.css">

    <script src="../../assets/js/index.js"></script>
</head>
<style>

</style>
<body>
    <?php include("header.php"); ?>
    <?php if(isset($include)) {?>
    <?php include("../client/" . $include); ?>
    <?php }else{ ?>
        <?php include("../client/resultat.php"); ?>
    <?php } ?>
    <?php include("../shared/footer.php"); ?>
</body>
</html>