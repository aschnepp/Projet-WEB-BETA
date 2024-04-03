<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/model.php");

class Promotions
{
    public function getPromotionsOptions()
    {
        $Model = new Model;
        $promotions = $Model->select("promotions", ["*"], "", false);

        foreach ($promotions as $promotion) {
            $promotionNom = htmlspecialchars($promotion->promotion_name, ENT_QUOTES, 'UTF-8');
            echo "<option value='{$promotionNom}'>{$promotionNom}</option>";
        }

        return $promotions;
    }

    public function getPromotionsList()
    {
        $Model = new Model;
        $promotions = $Model->select("promotions", ["*"], "", false);

        foreach ($promotions as $promotion) {
            $promotionNom = htmlspecialchars($promotion->promotion_name, ENT_QUOTES, 'UTF-8');
            echo "<li><input type='checkbox' id='{$promotionNom}'>
            <label for='{$promotionNom}'>
            $promotion->promotion_name
            </label></li>";
        }

        return $promotions;
    }

    public function getPromotions()
    {
        $Model = new Model;
        $promotions = $Model->select("promotions", ["*"], "", false);

        return $promotions;
    }
}
