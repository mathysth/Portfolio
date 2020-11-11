<?php


namespace School\Controler;


use School\Member\Member;
use School\Website\siteInterface;

class Controler_espaceMembre extends controler_default
{
    /**
     * Controler_espaceMembre constructor.
     */
    public function __construct()
    {
        $this->show();
    }

    private function show(){
        if($this->islogin()){
            $leftTab = $this->leftBar();
            $date = date("d-M-Y à i:H",strtotime($_SESSION['registerDate']));
            $email = $_SESSION['email'];
            $user = $_SESSION['user'];
            $memberId = $_SESSION['memberId'];
            require_once 'App/vues/v_espaceMembre.inc.php';
        }else{
            header("Location: index.php");
        }
    }

    public function suppressionCompte(){
        if(isset($_GET['action']) && $_GET['action'] == "suppressionCompte"){
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                $id = intval($_SESSION['memberId']);
                Member::deleteCompte($id);
                siteInterface::alert("Erreur","le compte numero : ".$_SESSION['memberId']." a été supprimé avec succès",1);
                session_destroy();
            }else{
                siteInterface::alert("Erreur","Une erreur est survenue lors de la tentative de suppression de compte",3);
            }
        }
    }

    public function deconnexion(){
        session_destroy();
        Controler_action::returnUser();
        if(isset($_GET['returnUri'])){
            header("Location: ".$_GET['returnUri']);
        }else{
            header("Location: index.php");
        }
    }

    private function leftBar(){
        $url = $this->getCurrentUrl();
        return "
        <div class=\"col-4\" style='margin-top: 10px;'>
            <ul class=\"list-group\" style='box-shadow: 2px 4px 12px grey;border-radius: 4px'>
                <li class=\"list-group-item\"><a href='https://github.com/mathysth/Portfolio' target='_blank'>Github Portfolio</a></li>
                <li class=\"list-group-item\">Créateur: <strong>Mathys Theolade</strong> </li>
                <li class=\"list-group-item\"> <a data-toggle=\"modal\" data-target=\"#suppression\">Supprimer votre compte</a> </strong></li>
            </ul>
        </div>
        ";
    }
}