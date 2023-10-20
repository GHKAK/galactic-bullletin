<?php
require 'models/Articles.php';
class HomeController{
    private const PAGE_SIZE = 4;
    public function index(){
        $page = isset($_GET['p']) ? $_GET['p'] : 1;
        $articles = new Articles();
        $articlesList = $articles->getPageArticles($page, self::PAGE_SIZE);
        $bannerArticle = $articles->getLatestArticle();
        $totalPages = $articles->getPagesCount(self::PAGE_SIZE);
        include 'views/home.php';
    }
}
?>