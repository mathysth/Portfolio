<?php


namespace School\Controler;


use School\Database\Database;
use School\Website\siteInterface;

/**
 * Class controler_accueil
 * @package School\Controler
 */
class controler_accueil extends controler_default
{

    /**
     * controler_accueil constructor.
     */
    public function __construct()
    {
        $this->show();
    }

    /**
     * Affiche la vue
     * @return void
     */
    public function show()
    {
        $categorie = $this->getCompetencesCategorie();
        $competences = $this->getCompetences();
        $realisation = $this->getRealisation();
        $parcour = $this->getParcour();
        require_once 'App/vues/v_accueil.inc.php';
        require_once 'App/vues/v_modals.inc.php';
    }

    /**
     * @return array|bool|mixed
     */
    private function getCompetencesCategorie()
    {
        return siteInterface::getCompetenceCategories();
    }

    /**
     * @return array|bool|mixed
     */
    private function getCompetences()
    {
        return siteInterface::getCompétences();
    }

    private function getRealisation(){
        return siteInterface::getRealisations();
    }

    private function getParcour(){
        return siteInterface::getParcour();
    }
}