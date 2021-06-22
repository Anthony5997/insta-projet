<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <a class="navbar-brand topnav" href=<?= empty($_SESSION['user']) ? '#' : '/insta-projet/index.php' ?>>
                <h6> <img src="https://img.icons8.com/fluent/40/000000/instagram-new.png" />Instapasgram</h6>
            </a>
            <div class="row">
                <ul class="navbar-nav">
                        <?php if (empty($_SESSION["user"])) { ?>
                        <li class="nav-item">
                            <div class="d-flex justify-content-end col-sm-4">
                                <a class="nav-link active" aria-current="page" href="sign-up.php">Connexion</a>
                            </div>
                        </li>
                        <?php  } else { ?>
                    <form class="d-flex">
                        <input class="form-control m-2" name="search-user" type="search" placeholder="Search" aria-label="Search" id="search-user">
                    </form>
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                            Salut <?= $_SESSION["user"]->getName() ?></a>
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                            <li><a class='dropdown-item' href='/insta-projet/profile/profile.php'>Mon profil</a></li>
                            <li><a class='dropdown-item' href='/insta-projet/profile/add-profile-picture.php'>Photo Profil</a></li>
                            <li><a class='dropdown-item' href='/insta-projet/profile/ajouter-photos.php'>Ajouter photos</a></li>
                            <li><a class='dropdown-item' href="/insta-projet/process/deco.php">Déconnexion</a></li>
                        </ul>
                    </li>
            </div>
                    <?php     }
            if (isset($_GET["message"])) { ?>
                <div style="padding: 10px; width:20vw; background:gray; color:#fff; margin-right: 10px; text-align: center; border-radius: 20px">
                    <?= $_GET["message"] ?>
                </div>
        <?php } ?>
        </ul>
        </div>
    </div>
    
</nav>

<body>
    <br><br>