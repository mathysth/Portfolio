<?php
namespace School\Website;

use School\Database\Database;

/**
 * Class siteInterface
 * @package School\Website
 */
class siteInterface
{

    /**
     * @param $string
     * @return string|string[]|null
     */
    public static function slugify($string) :string
    {
        $cleanedString = trim(strtolower($string));
        // Delete special characters
        $cleanedString = preg_replace("/[^a-z0-9-'_ ]/", "", $cleanedString);
        // Replace whitespace by -
        $cleanedString = preg_replace("/[' ]/", "-", $cleanedString);
        // Too much -
        $cleanedString = preg_replace("/[-]{2,}/", "-", $cleanedString);
        $cleanedString = preg_replace("/[-]{2,}[_' ]/", "-", $cleanedString);

        return $cleanedString;
    }

    /**
     * @param $titre
     * @param $message
     * @param $type
     * @return void
     */
    public static function alert($titre,$message,$type):void{
        switch ($type){
            case 1:{
                $possibleType = "success";
                break;
            }
            case 2:{
                $possibleType = "info";
                break;
            }
            case 3:{
                $possibleType = "error";
                break;
            }
        }
        echo "<script> alertPlugin('$titre','$message','$possibleType') </script>";
    }

    /**
     * @return array|bool|mixed
     */
    public static function getInterfaceOnglets() {
        return Database::prepare("SELECT * FROM onglets",null, true, null );
    }

    /**
     * @return array|bool|mixed
     */
    public static function getCompetenceCategories(){
        return Database::prepare('Select * from competence_categories', null, true, false);
    }

    /**
     * @return array|bool|mixed
     */
    public static function getCompétences(){
        return Database::prepare('Select * from competences', null, true, false);
    }

    /**
     * @return array|bool|mixed
     */
    public static function getRealisations(){
        return Database::prepare("SELECT * FROM realisation", null , true, false);
    }

    /**
     * @return array|bool|mixed
     */
    public static function getParcour(){
        return Database::prepare("SELECT * FROM parcours", null, true, false);
    }

}