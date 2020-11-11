<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= \School\Chemins\Chemins::STYLE ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= \School\Chemins\Chemins::STYLE ?>bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= \School\Chemins\Chemins::STYLE ?>bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= \School\Chemins\Chemins::STYLE ?>style.css?<?= date_timestamp_get(date_create())?>">

    <!-- Font / ScrollTools  -->
    <script src="https://kit.fontawesome.com/54309b8d30.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?= \School\Chemins\Chemins::JS ?>scrollreveal.js"></script>
    <script>
        function alertPlugin(title,content,type){
            swal(title, content, type);
        }
    </script>
    <title>Portfolio Mathys Theolade</title>

</head>
<body>
<div id="page">
    <header id="animation">
        <div class="bg" style="background-image: url('<?= \School\Chemins\Chemins::IMAGES ?>slide-bg.jpg');background-attachment: fixed;    box-shadow: 0 3px 10px 0 rgba(1, 3, 4, 0.35);"></div>
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light navbar-right">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php
                        foreach ($arrayNav as $onglet){
                            if($onglet['dropdown'] == 0){
                                ?>
                                <li class="nav-item"><a href="?controleur=<?= $onglet['controlerName'] ?>" class="nav-link"><?= $onglet['nom'] ?></a></li>
                                <?php
                            }else{
                                $option = explode(",",$onglet['options']);
                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= $onglet['nom'] ?> <i class="fas fa-sort-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php for($i = 0; $i < count($option); $i++){ ?>
                                            <a class="dropdown-item" href="?controleur=<?= $onglet['controlerName']?>#<?=$option[$i] ?>"><?=$option[$i] ?></a>
                                        <?php } ?>
                                    </div>
                                </li>
                            <?php }
                        }
                    ?>
                    <?php
                    if($islogin){ ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Membre <i class="fas fa-sort-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="?controleur=espaceMembre">Espace Membre</a>
                                    <a class="dropdown-item" href="?controleur=espaceMembre&action=deconnexion">Déconnexion</a>
                            </div>
                        </li>

                    <?php
                        if(isset($admin)){ ?>
                            <li class="nav-item"><a href="?controleur=admin" class="nav-link">Admin</a></li>
                    <?php
                    }
                    }else{
                    ?>
                        <li class="nav-item"><a href="?controleur=connexion" class="nav-link">Connexion</a></li>
                        <li class="nav-item"><a href="?controleur=inscription" class="nav-link">Inscription</a></li>
                    <?php
                    }
                    ?>
                    <li class="nav-item"><a href="mailto:mathystheolade973@gmail.com" class="nav-link">Contact</a></li>


                </ul>
            </div>


        </nav>
    </header>

    <?= $content ?>



    <footer id="footer" class="mainFooter bg" style="background-image: url('<?= \School\Chemins\Chemins::IMAGES ?>slide-bg.jpg');background-attachment: fixed; height: auto;opacity: 1 !important;    box-shadow: 0 -10px 10px 0 rgba(1, 3, 4, 0.35);">

        <p id="footer" style="opacity: 1 !important;">Mathys Theolade | Etudiant en BTSSIO</p>

    </footer>

    <!-- JS -->
    <script src="<?= \School\Chemins\Chemins::JS ?>main.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</div>
</body>
</html>
