<?php


namespace School\Website\Email;

/**
 * Class Email
 * @package School\Website\Email
 */
//TODO Refonte entière de la classe en utilisant PHPMailer
class Email
{
    private $handler;

    public function __construct()
    {

    }

    /**
     * Envoi un email à un utilisateur
     * @param $string_mail string Email utilisateur
     * @param $string_subject string Objet email
     * @param $string_message string Message email
     * @return void
    **/
    public static function sendMail($string_mail, $string_subject, $string_message){
        // To
        $to = $string_mail;

        // Subject
        $subject = $string_subject;

        // clé aléatoire de limite
        $boundary = md5(uniqid(microtime(), TRUE));

        // Headers
        $headers = 'From: '.\School\Config\Website::NAME_WEBSITE.' <no-reply@'.\School\Config\Website::LINK_WEBSITE.'>'."\r\n";
        $headers .= 'Mime-Version: 1.0'."\r\n";
        $headers .= 'Content-Type: multipart/mixed;boundary='.$boundary."\r\n";
        $headers .= "\r\n";

        // Message
        $msg = \School\Config\Website::NAME_WEBSITE."\r\n\r\n";

        // Message HTML
        $msg .= '--'.$boundary."\r\n";
        $msg .= 'Content-type: text/html; charset=utf-8'."\r\n\r\n";
        $msg .= $string_message."\r\n";

        // Texte
        $msg .= '--'.$boundary."\r\n";
        $msg .= 'Content-type:text/plain;charset=utf-8'."\r\n";
        $msg .= 'Content-transfer-encoding:8bit'."\r\n";

        $msg .= '--'.$boundary."\r\n";

        mail($to, $subject, $msg, $headers);
    }


}