<?php


namespace School\Controler\Admin;


class Controler_adminGestionProduits extends Controler_default_admin
{

    public function __construct(){
        $this->setPageToAdminAccess();
        $this->show();
    }

    private function show(){
        $categories = $this->getCategorie();
        $leftTab = $this->showLeftTab();
        require_once 'App/vues/admin/v_gestionProduits.inc.php';
    }
}