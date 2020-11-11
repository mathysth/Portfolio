<?php

namespace School\Controler;

use School\Member\Member;
use School\Website\siteInterface;

class controler_inscription extends controler_default
{

    public function __construct()
    {
        $this->redirectIfIsNotLog();
        $this->addMember();
        $this->show();
    }


    public function show(){
        require_once 'app/vues/v_inscription.inc.php';
    }

    public function addMember(){
        if(isset($_POST['inscription'])){
            $pseudo = trim($_POST['pseudo']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $repass = $_POST['repass'];

            if(empty($pseudo) || empty($email) || empty($password) ||  empty($repass)){
                siteInterface::alert("Erreur","Veuillez remplir tout les champs",3);
            }else{
                if($password == $repass){
                    if(strlen($password) >= 6){
                        $member = new Member($pseudo,$password,$email);
                        $member->createUser();
                    }else{
                        siteInterface::alert("Oupss...","Mot de passe trop cour, 6 caractères minimums",2);
                    }
                }else{
                    siteInterface::alert("Oupss...","Vos mots de passe sont différents",2);
                }
            }
        }
    }
}