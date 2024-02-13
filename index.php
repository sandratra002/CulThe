<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CulThe</title>
    <link rel="stylesheet" href="assets/css/indexChoice.css">
</head>
<style>
    body{
        overflow: hidden;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
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
        width: 200px;
        height: 200px;

        font-size: 2rem;
        text-decoration: none;
        color : white;
        border-radius: 10px;

        background: #4d902c;
        box-shadow: 0px 0px 5px 0px black;

        display : flex;
        justify-content: center;
        align-items: center;

        transition: .5s;
    }

    a:hover{
        box-shadow: 0px 0px 10px 0px black;
    }
</style>
<body>
    <div class="container">
        <a href="./pages/admin/index.php"> <i class="fa fa-lock"></i> Admin</a>
        <a href="./pages/client/index.php"><i class="fa fa-user"></i> Client</a>
    </div>
</body>
</html>
