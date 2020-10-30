<?php


namespace School\Controler;


class Controler_competences extends controler_default
{

    /**
     * Controler_competences constructor.
     */
    public function __construct()
    {
        $this->show();
    }


    private function show(){
        require_once 'App/vues/v_competences.inc.php';
    }
}