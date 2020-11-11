<?php


namespace School\Controler\Admin;


use School\Admin\Admin;
use School\Controler\controler_default;

class Controler_default_admin extends controler_default
{
    /**
     * Protege les pages admin avec une verification de token
     */
    protected function setPageToAdminAccess(){
        if(isset($_SESSION['admin'])){
            $token = Admin::getAdminTemporaryToken();
            if($_SESSION['admin'] == $token['token']){
                // Peut acceder à la page
            }else{
                die("Erreur: Token admin invalide, veuillez vous reconnecter pour en génerer un nouveau  <a href='index.php?controleur=espaceMembre&action=deconnexion&returnUri=?controleur=connexion'> ici </a>");
            }
        }else{
            header("Location: index.php");
        }
    }

    /**
     * @return string
     */
    protected function showLeftTab(){
        return "
        <div class=\"col-2\" style=\"margin-top: 10px\">
            <a href='?controleur=admin'><i class=\"fas fa-arrow-circle-left \" style='color: black;'></i> <span style='color: black;vertical-align: top'><small>Retourner au sélecteur</small></span> </a>
        </div>
        ";
    }


}