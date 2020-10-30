<?php


namespace School\Controler;

use School\Website\Email\Email;

/**
 * Class controler_email
 * @package School\Controler
 */
class controler_email extends controler_default
{

    /**
     * @var int
     */
    private $option;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $send_to;

    /**
     * controler_email constructor.
     * @param $option
     * @param $email
     */
    public function __construct($option, $email)
    {
        $this->option  = $option;
        $this->send_to = $email;
        $this->sendEmail();
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @param $template
     * @return false|string
     */
    private function requireEmailTemplate($template){
        $content  =  $template;
        ob_start();
        require "app/vues/email/template/default.php";
        $finalContent = ob_get_clean();
        return $finalContent;
    }


    /**
     * @return false|string
     */
    private function requireEmailVue(){
        ob_start();
        switch ($this->option){
            case 1:{
                $this->setSubject(\School\Config\Website::NAME_WEBSITE." - Vérication compte");
                require "app/vues/email/email_verification.php";
                break;
            }
            case 2:{
                $this->setSubject(\School\Config\Website::NAME_WEBSITE." - Merci pour votre achat");
                require "app/vues/email/email_remerciement_achat.php";
                break;
            }
            case 3:{
                $this->setSubject(\School\Config\Website::NAME_WEBSITE." - Changement de mot de passe");
                require "app/vues/email/email_mot_de_passe_oublie.php";
                break;
            }
            case 4:{
                $this->setSubject(\School\Config\Website::NAME_WEBSITE." - Activation de compte");
                require "app/vues/email/email_activation_compte.php";
                break;
            }
        }
        $content = ob_get_clean();
        return $this->requireEmailTemplate($content);
    }


    /**
     * Envoi un email à l'utilisateur en fonction de l'option
     * @return void
     */
    public function sendEmail()
    {
        // TODO entièrement refaire le système d'email en utilisant phpmailer
        \School\Website\Email\Email::sendMail($this->send_to,$this->subject,$this->requireEmailVue());
    }
}