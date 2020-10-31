<?php
session_start();
require_once('App/modeles/Autoloader.php');
$autoload = new \School\Autoloader();
$autoload::register();

$arrayNav = \School\Controler\controler_default::getAllOnglets();
$islogin = \School\Controler\controler_default::islogin();

ob_start();

if (!isset($_GET['controleur']) || empty($_GET['controleur'])) {
    $controlerAccueil = new \School\Controler\controler_accueil();
    $controlerAccueil->show();
} else {
    $classeControleur = 'Controler_' . $_GET['controleur'];
    $fichierControleur = $classeControleur . ".php";

    if(strpos($_GET['controleur'],"admin") === false){
        $objectWithNamepsace = $autoload->getNamespace().'\Controler\Controler_' . $_GET['controleur'];

        if(file_exists(\School\Chemins\Chemins::CONTROLEURS . $fichierControleur)){
            require_once(\School\Chemins\Chemins::CONTROLEURS . $fichierControleur);

            $objetControleur = new $objectWithNamepsace();
            if(isset($_GET['action'])){
                $action = $_GET['action'];
                $objetControleur->$action();
            }
        }else{
            $controlerAccueil = new \School\Controler\controler_accueil();
            $controlerAccueil->show();
        }
    }else{
        $objectWithNamepsace = $autoload->getNamespace().'\Controler\Admin\Controler_' . $_GET['controleur'];

        if(file_exists(\School\Chemins\Chemins::CONTROLEURS_ADMIN . $fichierControleur)){
            require_once(\School\Chemins\Chemins::CONTROLEURS_ADMIN . $fichierControleur);

            $objetControleur = new $objectWithNamepsace();
            if(isset($_GET['action'])){
                $action = $_GET['action'];
                $objetControleur->$action();
            }
        }else{
            $controlerAccueil = new \School\Controler\controler_accueil();
            $controlerAccueil->show();
        }
    }
}
$content = ob_get_clean();
require_once( \School\Chemins\Chemins::TEMPLATE .'default.php');