<?php


namespace School\Controler;


use School\ListingError\Member\MemberMessageError;
use School\Member\Member;

class controler_inscription extends controler_default
{

    public function __construct()
    {
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
                echo MemberMessageError::emptyField();
            }else{
                if($password == $repass){
                    if(strlen($password) >= 6){
                        $member = new Member($pseudo,$password,$email);
                        $member->createUser();
                        echo $member->getAlert();

                    }else{
                        echo MemberMessageError::passwordTooShort();
                    }
                }else{
                    echo MemberMessageError::bothPasswordAreDifferent();

                }
            }
        }
    }

}