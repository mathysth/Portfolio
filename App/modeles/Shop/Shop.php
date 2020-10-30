<?php


namespace School\Shop;


use School\Database\Database;

/**
 * Class Shop
 * @package School\Shop
 */
class Shop
{

    /**
     * @param $libelle
     * @return  bool
     */
    public static function addCategorie($libelle): bool
    {
        if(self::getCategorieByLibelle($libelle)){
            return false;
        }else{
            Database::prepare("INSERT INTO categorie(libelle) VALUES (:libelle)", array(":libelle" => $libelle), null , false);
            return true;
        }
    }

    /**
     * @return array
     */
    public static function getCategorie() :array {
        return Database::prepare("SELECT * FROM categorie", null , true, null);
    }

    /**
     * @param $libelle
     * @return array
     */
    public static function getCategorieByLibelle($libelle): array {
        return Database::prepare("SELECT * FROM  categorie WHERE libelle = :libelle ", array(":libelle" => $libelle) , true, null);
    }

    /**
     * @param $id
     * @return array
     */
    public static function getCategorieById($id) :array {
        return Database::prepare("SELECT * FROM  categorie WHERE id = :id ", array(":id" => $id) , true, true);
    }

    /**
     * delete la categorie selectionne
     * @param $id
     */
    public static function deleteCategorie($id):void{
        Database::prepare("DELETE FROM categorie WHERE id =:id",array(":id" => $id),null,false);
    }

}