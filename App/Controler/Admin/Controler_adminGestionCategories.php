<?php

namespace School\Controler\Admin;

use School\Shop\Shop;
use School\Website\siteInterface;

class Controler_adminGestionCategories extends Controler_default_admin
{
    public function __construct(){
        $this->setPageToAdminAccess();
        $this->gestionPost();
        $this->show();
    }

    private function show(){
        $categories = $this->getCategorie();
        $leftTab = $this->showLeftTab();
        require_once 'App/vues/admin/v_gestionCategories.inc.php';
    }

    private function gestionPost(){
        if (isset($_POST['addCategorie'])) {
            $nom = trim($_POST['nom']);
            if (!empty($nom)) {
                $req = Shop::addCategorie($nom);

                if($req){
                    siteInterface::alert("Succès", "Categorie: $nom ajouté avec succès", 1);
                }else{
                    siteInterface::alert("Oupps...", "Categorie: $nom existe déja", 2);
                }
            } else {
                siteInterface::alert("Erreur", "Veuillez remplir tout les champs", 3);
            }
        }

        if(isset($_POST['suppressionCat'])){
            $selectedCategorie = intval($_POST['selectedCat']);
            if(Shop::getCategorieById($selectedCategorie)){
                try {
                    $categorie = Shop::getCategorieById($selectedCategorie);
                    Shop::deleteCategorie($selectedCategorie);
                    siteInterface::alert("Confirmation", "La catégorie ". $categorie['libelle'] ." a été supprimé avec succès","1");
                }catch (\Exception $e){
                    siteInterface::alert("Erreur", "Veuillez supprimer tous les produits contenant la catégorie: ". $categorie['libelle'] ." avant de la supprimer","3");
                }
            }else{
                siteInterface::alert("Erreur", "La catégorie ayant pour numero : ". $selectedCategorie ." n'existe pas ou plus","3");
            }
        }

    }
}