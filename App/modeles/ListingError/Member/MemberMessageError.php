<?php
namespace School\ListingError\Member;

/**
 * Class MemberMessageError
 * @package School\ListingError\Member
 */
class MemberMessageError
{

    /**
     * @return string
     */
    public static function emptyField(){
        return "<p class='alertNotification shadowAlert'>Veuillez remplir tout les champs</p>";
    }

    /**
     * @return string
     */
    public static function numberOrPostalCodeNotNumeric(){
        return "<p class='alertNotification'>Le code postal et le numéro de téléphone ne doivent comporter uniquement que des chiffres</p>";
    }

    /**
     * @return string
     */
    public static function userAlreadyUse(){
        return "<p class='alertNotification shadowAlert'>Pseudo ou Email déja utilisé </p>";
    }

    /**
     * @return string
     */
    public static function samePass(){
        return "<p class='alertNotification shadowAlert'>Veuillez rentrer le même mot de passe </p>";
    }

    /**
     * @return string
     */
    public static function registerSuccess(){
        return "<p class='alertNotification shadowalertNotification'>Inscription effectuée avec succès</p>";
    }

    /**
     * @return string
     */
    public static function loginSuccess($account){
        return "<p class='alertNotification shadowalertNotification'>Connexion éffectué  avec succès sur le compte ".$account."</p>";
    }

    /**
     * @return string
     */
    public static function wrongPassword(){
        return "<p class='alertNotification shadowalertNotification'>Mot de passe incorrect </p>";
    }

    /**
     * @return string
     */
    public static function bothPasswordAreDifferent(){
        return "<p class='alertNotification shadowalertNotification'> Vos mots de passe sont différents </p>";
    }

    /**
     * @return string
     */
    public static function passwordTooShort(){
        return "<p class='alertNotification shadowalertNotification'> Mot de passe trop cour, 6 caractères minimums </p>";
    }

    /**
     * @return string
     */
    public static function userNotExist(){
        return "<p class='alertNotification shadowalertNotification'>Utilisateur inexistant </p>";
    }


}