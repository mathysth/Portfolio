<?php
namespace School\Controler\Admin;


class Controler_admin extends controler_default_admin
{
    public function __construct()
    {
        $this->setPageToAdminAccess();
        $this->show();
    }

    private function show(){
        require 'App/vues/admin/v_accueilAdmin.inc.php';
    }

}