<?php

require "{$_SERVER["DOCUMENT_ROOT"]}/libs/smarty/libs/bootstrap.php";

class SmartyCatalyst extends Smarty
{

    public function __construct()
    {
        parent::__construct();

        $this->setTemplateDir("{$_SERVER["DOCUMENT_ROOT"]}/view/templates/");
        $this->setCompileDir("{$_SERVER["DOCUMENT_ROOT"]}/build/");
        $this->setCacheDir("{$_SERVER["DOCUMENT_ROOT"]}/cache/");

        $this->setEscapeHtml(true);


        #TODO : REMOVE THIS COMMENT WHEN READY FOR PRODUCTION
        #$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
    }

    private $model;

    public function __construct()
    {
        $this->model = new Model("stagecatalyst", "31.32.226.226", 3306, "admin", "Ur38sy36&*");
    }

    public function reviewEntreprise()
    {
        return $this->model->callProcedure("GetFirmsInfo");
    }

    public function getTopFirms()
    {
        return $this->model->callProcedure("topFirms");
    }

    public function getSectors()
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
}