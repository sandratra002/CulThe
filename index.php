<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CulThe</title>
</head>
<style>
    body{
        overflow: hidden;
    }
    .container{
        overflow: hidden;
        min-width: 100%;
        min-height: 100vh;
        
        display : flex;
        justify-content: center;
        align-items: center;
        gap: 2rem;
    }

    a{
        width: 100px;
        height: 100px;

        font-size: 2rem;
        text-decoration: none;
        color : black;
    }
</style>
<body>
    <div class="container">
        <a href="./pages/admin/index.php"> <i class="fa fa-lock"></i> Admin</a>
        <a href="./pages/client/index.php"><i class="fa fa-user"></i> Client</a>
    </div>
</body>
</html>