<?php


namespace School\Controler\Admin;



class Controler_ajoutAdmin extends controler_default_admin
{

    public function __construct()
    {
        $this->show();
    }

    private function show(){
        $categories = $this->getCategorie();
        require_once 'App/vues/admin/v_ajoutAdmin.inc.php';
    }
}