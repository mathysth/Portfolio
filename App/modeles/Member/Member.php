<?php


namespace School\Member;

use School\Database\Database;
use School\Website\siteInterface;

/**
 * Class Member
 * @package School\Member
 */
class Member
{

    /**
     * @var string
     */
    private $pseudo;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $email;


    /**
     * Member constructor.
     * @param $pseudo
     * @param $password
     * @param null $email
     */
    public function __construct($pseudo = null, $password = null, $email = null)
    {
        if ($pseudo) {
            $this->pseudo = $pseudo;
        }
        if ($password) {
            $this->password = $password;
        }
        if ($email) {
            $this->email = $email;
        }
    }

    /**
     * @param $pseudo
     */
    private function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    /**
     * @param $string
     */
    private function setEmail($string)
    {
        $this->email = $string;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Création de la session utilisateur  si existant
     * @return array|bool|mixed
     */
    public function logUser()
    {

        $req = Database::prepare("SELECT * FROM member  where pseudo = :pseudo OR email =  :email", array(":pseudo" => $this->pseudo, ":email" => $this->email), true, true);
        $count_user = Database::count("SELECT * FROM member where pseudo = :pseudo or email = :email", array(':pseudo' => $this->pseudo, ":email" => $this->email));

        if ($count_user != 0) {
            if (password_verify($this->password, $req["pass"])) {

                $this->setPseudo($req['pseudo']);
                $this->setEmail($req['email']);
                $id = $req[0];

                $_SESSION['memberId'] = $id;
                $_SESSION['user'] = $this->pseudo;
                $_SESSION['email'] = $this->email;

                if ($req['isAdmin'] == 1) {
                    $token = $this->createRandomToken();
                    Database::prepare("DELETE FROM admin_temporary_token WHERE member_id = :id", array(":id" => $id),false);
                    Database::prepare("insert into admin_temporary_token(member_id,token,createdDate) VALUES(:member,:token,now())",
                        array(
                            ":member" => $id,
                            ":token" => $token
                            ), false);
                    $_SESSION['admin'] = $token;
                }

                siteInterface::alert("Succès", "Connexion éffectué  avec succès sur le compte ". $this->pseudo, 1);

            } else {
                siteInterface::alert("Erreur", "Mot de passe incorrect", 3);
            }

        } else {
            siteInterface::alert("Oupps...", "Utilisateur inexistant", 2);
        }
        return $req;
    }

    /**
     *  Creation de l'utilisateur
     * @return void
     */
    public function createUser()
    {
        $password_crypt = password_hash($this->password, PASSWORD_BCRYPT);

        $req = Database::count("SELECT id FROM member where pseudo = :pseudo or email = :email", array(':pseudo' => $this->pseudo, ":email" => $this->email));

        if (strlen($this->password) >= 6) {
            if ($req != 0) {
                siteInterface::alert("Oupps...", "Pseudo ou Email déja utilisé", 2);
            } else {
                Database::prepare("INSERT INTO member(pseudo,pass,email,register_date) VALUES(:pseudo,:password,:email,Now())", array(':pseudo' => $this->pseudo, ':password' => $password_crypt, ':email' => $this->email), false);
                //TODO: envoyer un email  avec un lien de confirmation pour activer le compte
                $this->setPassword(null);
                siteInterface::alert("Succès.", "Inscription effectuée avec succès", 1);
            }
        }

    }

    /**
     * @return string
     */
    private function createRandomToken(){
        $result = "";
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789$11";
        $charArray = str_split($chars);
        for($i = 0; $i < 30; $i++){
            $randItem = array_rand($charArray);
            $result .= "".$charArray[$randItem];
        }
        return $result;
    }

}
