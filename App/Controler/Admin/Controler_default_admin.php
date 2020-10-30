<?php


namespace School\Controler\Admin;


use School\Controler\controler_default;
use School\Database\Database;

class Controler_default_admin extends controler_default
{
    /**
     * Protege les pages admin avec une verification de token
     */
    protected function setPageToAdminAccess(){
        if(isset($_SESSION['admin'])){
            $token = Database::prepare("SELECT token FROM admin_temporary_token WHERE member_id = :id ",array(":id" => $_SESSION['memberId']), true,true);
            if($_SESSION['admin'] == $token['token']){
                // Peut acceder à la page
            }else{
                die("Error: Token admin invalide, veuillez vous reconnecter pour en génerer un nouveau");
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
            <ul class=\"list-group\">
                <li class=\"list-group-item\">User : ". $_SESSION['user']." </li>
                <li class=\"list-group-item\">Accueil admin</li>
                <li class=\"list-group-item\">Gérer Catégories</li>
                <li class=\"list-group-item\">Gérer Produits</li>
            </ul>
        </div>
        ";
    }


}