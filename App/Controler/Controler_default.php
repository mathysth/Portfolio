<?php


namespace School\Controler;


use School\Chemins\Chemins;
use School\Database\Database;
use School\Shop\Shop;

/**
 * Class controler_default
 * @package School\Controler
 */
class controler_default
{

    /**
     * @var string
     */
    private $css = Chemins::STYLE;
    /**
     * @var string
     */
    private $js =  Chemins::JS;

    /**
     * @return string
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * @return string
     */
    public function getJs()
    {
        return $this->js;
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
     * @return array|bool|mixed
     */
    public function getAllOnglets(){
         return Database::prepare("SELECT * FROM onglets",null, true, null );
    }

    /**
     * @return array|bool|mixed
     */
    protected function getCategorie(){
        $shop = new Shop();
        return $shop->getCategorie();
    }


}