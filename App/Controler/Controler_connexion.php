<?php


namespace School\Controler;

use School\Member\Member;
use School\Website\siteInterface;

/**
 * Class controler_connexion
 * @package School\Controler
 */
class Controler_connexion extends controler_default
{
    /**
     * controler_connexion constructor.
     */
    public function __construct()
    {
        $this->redirectIfIsLog();
        $this->logMember();
        $this->show();
    }

    /**
     * Affiche la vue
     * @return void
     */
    public function show(){
        require_once 'App/vues/v_connexion.inc.php';
    }

    /**
     * Gère la connexion de l'utilisateur
     * @return void
     */
    public function logMember(){
        if(isset($_POST['connexion'])){
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];

            if(empty($pseudo) || empty($password)){
                siteInterface::alert("Erreur", "Veuillez remplir tout les champs", 3);
            }else{
                $member = new Member($pseudo,$password);
                $bddResponse = $member->logUser();
                if($bddResponse != null){
                    if(isset($_POST['remindMe']) and $_POST['remindMe'] == "on"){
                        setcookie("user",$pseudo,time() + 3600 * 24 * 2);
                        if($bddResponse['isAdmin'] != 0){
                            setcookie("Admin",1,time() + 3600 * 24 * 2);
                        }
                    }
                }
            }
        }
    }

}