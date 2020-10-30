<?php


namespace School\Controler;


use School\Database\Database;

class Controler_shop extends controler_default
{
    /**
     * Controler_shop constructor.
     */
    public function __construct()
    {
        $this->show();
    }

    private function show(){
        $categorie = $this->getCategorie();
        $lesProduits = $this->getLesProduits();
        $categorieProduit = $this->getCategorieProduit();
        require 'app/vues/v_shop.inc.php';
    }

    /**
     * @return mixed
     */
    private function getCategorieProduit(){
        if(isset($_GET['categorie']) && !empty($_GET['categorie'])) {
            return $_GET['categorie'];
        }
    }

    /**
     * @return array|bool|mixed
     */
    private function getLesProduits(){
        if(isset($_GET['categorie']) && !empty($_GET['categorie'])){
            return Database::prepare('SELECT *  FROM produit p, categorie c Where p.idCategorie = c.id AND libelle = :libCateg', array(":libCateg" => $_GET["categorie"]) , true,  null);
        }
    }
}