<?php


namespace School\Controler;

use School\Shop\Shop;
use School\Website\siteInterface;

/**
 * Class controler_default
 * @package School\Controler
 */
class controler_default
{

    protected function redirectIfIsLog(){
        if($this->islogin()){
            header('Location: ?controleur=espaceMembre');
        }
    }

    /**
     * @return bool
     */
    public function islogin(){
        if(isset($_SESSION['user'])){
            return  true;
        }else{
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isAdmin(){
        if(isset($_SESSION['admin'])){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return array|bool|mixed
     */
    public function getAllOnglets(){
         return siteInterface::getInterfaceOnglets();
    }

    /**
     * @return string
     */
    public  function getCurrentUrl(){
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
        return $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }

    /**
     * @return array|bool|mixed
     */
    protected function getCategorie(){
        $shop = new Shop();
        return $shop->getCategorie();
    }


}