<?php


namespace School\Controler;


class controler_error extends controler_default
{
    public function __construct()
    {
        $this->show();
    }

    public function show(){
        require 'app/vues/error.inc.php';
    }

}