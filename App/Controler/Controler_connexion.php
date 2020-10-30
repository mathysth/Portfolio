<?php


namespace School\Controler;

use School\ListingError\Member\MemberMessageError;
use School\Member\Member;

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
                echo MemberMessageError::emptyField();
            }else{

                $member = new Member($pseudo,$password);
                $bddResponse = $member->logUser();
                echo $member->getAlert();
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