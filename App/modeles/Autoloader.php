<?php
namespace School;

class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * @return string
     */
    public function getNamespace(){
        return __NAMESPACE__;
    }
    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class){
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        $class = str_replace('\\', '/', $class);
        $word = $class;


        $pos = strpos($word,"Controler");

        if( $pos === false){
            require_once 'App/modeles/' . $class . '.php';
        }else{
            require_once ('App/' . $class . '.php');
        }
    }

}