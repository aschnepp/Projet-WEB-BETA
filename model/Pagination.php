<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");
require_once("{$_SERVER["DOCUMENT_ROOT"]}/controller/Cookie.php");

class Pagination extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLinks()
    {
        $url = $_SERVER['REQUEST_URI'];

        if (str_contains($url, "wishlist")) {
            $tableName = "Wishlists";
        } else {
            $tableName = "Candidates";
        }

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perPage = 5;
        // $start = ($page - 1) * $perPage;
        // $end = $start + $perPage;

        $Cookie = new Cookie;
        $id = $Cookie->get('ID');
        //$id = 15;
        // var_dump($id);

        $nbOffers = count($this->select("{$tableName}", ['*'], "user_id = {$id}", false));

        $noResult = false;
        if ($nbOffers == 0) {
            $noResult = true;
        }

        $totalPages = ceil($nbOffers / $perPage);
        // var_dump($nbOffers);
        // var_dump($totalPages);

        $links = "<div id='pagination'>";

        if (($page - 1) > 1 && !$noResult) {
            $links .= '<a href="?page=1">Première</a>';
        }

        if ($page > 1 && !$noResult) {
            $links .= '<a href="?page=' . ($page - 1) . '">Précédente</a>';
        }

        if (!$noResult) {
            $links .= '<a href="?page=' . $page . '" ' . "class='active'>" . $page . '</a>';
        }

        if ($page < $totalPages  && !$noResult) {
            $links .= '<a href="?page=' . ($page + 1) . '">Suivante</a>';
        }

        if (($page + 1) < $totalPages && !$noResult) {
            $links .= '<a href="?page=' . $totalPages . '">Dernière</a>';
        }

        $links .= "</div>";

        echo $links;
        return $links;
    }
}
