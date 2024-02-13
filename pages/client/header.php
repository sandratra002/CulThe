<header id="main-header">
        <h1 class="header__logo"><a href="main.php?page=resultat">CulThe</a></h1>

        <div>
            <nav class="header__nav nav">
                <ul>
                    <li class="nav__item"><a href="main.php?page=resultat">Home</a></li>
                    <li class="nav__item"><a href="main.php?page=cueillettes">Cueillettes</a></li>
                    <li class="nav__item"><a href="main.php?page=depenses">Depenses</a></li>
                    <li class="nav__item"><a href="main.php?page=payement">Payement</a></li>
                    <li class="nav__item"><a href="main.php?page=prevision">Prevision</a></li>
                    <li class="nav__item"><a href="../../handler/client/logOut.php">Log Out <i class="fa fa-sign-out"></i></a></li>

                </ul>
            </nav>
            
            <span class="vertical-sep"></span>

            <div class="header__profile profile">
                <div class="profile__img">
                    <img src="../../assets/images/002.jpg" alt="Profile image">
                </div>

                <div class="profile__details">
                    <span class="profile__uid"><?php echo $_SESSION['user']['username']; ?></span>
                    <span class="profile__status">Admin</span>
                </div>
            </div>
        </div>
    </header>