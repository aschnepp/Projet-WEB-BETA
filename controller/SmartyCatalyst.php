<?php

require_once "{$_SERVER["DOCUMENT_ROOT"]}/libs/smarty/libs/bootstrap.php";
require_once "{$_SERVER["DOCUMENT_ROOT"]}/model/Secteurs.php";
require_once "{$_SERVER["DOCUMENT_ROOT"]}/model/Regions.php";
require_once "{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php";

class SmartyCatalyst extends Smarty
{

    private Model $model;

    public function __construct($model)
    {
        parent::__construct();

        $this->setTemplateDir("{$_SERVER["DOCUMENT_ROOT"]}/view/templates/");
        $this->setCompileDir("{$_SERVER["DOCUMENT_ROOT"]}/build/");
        $this->setCacheDir("{$_SERVER["DOCUMENT_ROOT"]}/cache/");

        $this->setEscapeHtml(true);

        $this->registerPlugin("modifier", "strtolower", "strtolower");
        $this->registerPlugin("modifier", "str_replace", "str_replace");
        $this->registerPlugin("modifier", "htmlspecialchars", "htmlspecialchars");

        $this->model = $model;

        #TODO : REMOVE THIS COMMENT WHEN READY FOR PRODUCTION
        #$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
    }

    public function reviewEntreprise($id)
    {
        return $this->model->callProcedure("GetFirmInfo", [$id]);
    }

    public function reviewEntreprises()
    {
        return $this->model->callProcedure("GetFirmsInfo");
    }

    public function getTopFirms()
    {
        return $this->model->callProcedure("topFirms");
    }

    public function getSectorsCount()
    {
        return $this->model->callProcedure("count_activity_sector_totals");
    }

    public function getFirmRegions()
    {
        return $this->model->callProcedure("EntreprisesParRegion");
    }

    public function getDurationStage()
    {
        return $this->model->callProcedure("durationStage");
    }

    public function getPromotions()
    {
        return $this->model->callProcedure("repartitionPromotions");
    }

    public function getSkills()
    {
        return $this->model->callProcedure("repartitionSkills");
    }

    public function getOffersRegions()
    {
        return $this->model->callProcedure("OffresParRegion");
    }

    public function getTopOffers()
    {
        return $this->model->callProcedure("topOffers");
    }

    public function getReview($userId, $firmId)
    {
        return $this->model->callProcedure("verifNotation", [$userId, $firmId]);
    }

    public function giveReview($userId, $firmId, $grade, $comment, $alreadyReviewed)
    {
        if ($alreadyReviewed) {
            $this->model->callProcedure("updateNotation", [$userId, $firmId, number_format($grade, 1, ".", ''), $comment]);
        } else {
            $this->model->callProcedure("insertNotation", [$userId, $firmId, number_format($grade, 1, ".", ''), $comment]);
        }
    }

    public function getProfil($userId)
    {
        return $this->model->selectFromUser(["*"], "user_id = " . $userId, true);
    }

    public function getAddresse($addId)
    {
        return $this->model->callProcedure("getAddress", [$addId]);
    }

    public function getStudent($userId)
    {
        return $this->model->callProcedure("getEtudiant", [$userId]);
    }

    public function getTuteur($userId)
    {
        return $this->model->callProcedure("getTuteur", [$userId]);
    }

    public function getSectors(): array
    {
        $sectorModel = new Secteurs($this->model);
        return $sectorModel->getSecteurs();
    }

    public function getFirmInfo(int $id)
    {
        return $this->model->callProcedure("GetFirmInfo", [$id], true);
    }

    public function getAllRegion(): array
    {
        $regionModel = new Regions($this->model);
        return $regionModel->getRegions();
    }

    public function getFirmAdresses(int $id)
    {
        return $this->model->callProcedure("getFirmAdresses", [$id]);
    }

    public function getFirmSectors(int $id)
    {
        return $this->model->callProcedure("getFirmSectors", [$id], false, [PDO::FETCH_COLUMN, 0]);
    }

    public function getFirmReviews(int $firm_ID, int $user_ID = null)
    {
        $args = array();
        $args[] = $firm_ID;
        $user_ID == null ? $args[] = null : $args[] = $user_ID;
        return $this->model->callProcedure("getFirmReview", $args, true);
    }
}
