<?php


namespace School\Controler;


use School\Member\Member;
use School\Website\siteInterface;

class Controler_action
{

    public static function returnUser(){
        if(isset($_GET['returnUri']) && !empty($_GET['returnUri'])){
            header('Location: '. $_GET['returnUri']);
        }else{
            header('Location: index.php');
        }
    }


}