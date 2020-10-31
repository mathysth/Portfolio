<?php


namespace School\Controler;


use School\Chemins\Chemins;
use School\Database\Database;
use School\Shop\Shop;
use School\Website\siteInterface;

/**
 * Class controler_default
 * @package School\Controler
 */
class controler_default
{
    /**
     * @return bool
     */
    public static function islogin(){
        if(isset($_SESSION['user'])){
            return  true;
        }else{
            return false;
        }
    }

    /**
     * @return array|bool|mixed
     */
    public static function getAllOnglets(){
         return siteInterface::getInterfaceOnglets();
    }

    /**
     * @return array|bool|mixed
     */
    protected function getCategorie(){
        $shop = new Shop();
        return $shop->getCategorie();
    }


}