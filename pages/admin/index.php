<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>CulThe</title>

    <link rel="stylesheet" href="../../assets/lib/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Login page for Admin</h2>
                    <p class="w-lg-50">Here is the page to login for Admin</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4 user_icon"><svg class="bi bi-person" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"></path>
                                </svg></div>
                            <form class="text-center" method="post">
                                <div class="mb-3"><input class="form-control" type="text" name="user_name" placeholder="UserName" style="margin-right: 93px;" value="admin"/></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" value="admin"/></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Login</button></div>
                                <p class="text-muted">Forgot your password?</p>
                            </form>
                        </div>
                        <p style="padding: 1px;padding-left: 130px;color:red;">This is an error</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("../shared/footer.php"); ?>
</body>

</html>