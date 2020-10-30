<?php


namespace School\Controler;


use School\Database\Database;

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
        return Database::prepare('Select * from competence_categories', null, true, false);
    }

    /**
     * @return array|bool|mixed
     */
    private function getCompetences()
    {
        return Database::prepare('Select * from competences', null, true, false);
    }

    private function getRealisation(){
        return Database::prepare("SELECT * FROM realisation", null , true, false);
    }

    private function getParcour(){
        return Database::prepare("SELECT * FROM parcours", null, true, false);
    }
}