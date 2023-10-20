<?php
include 'includes/autoload.php';
require 'models/Articles.php';

class ArticleController
{
    public function show()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $articles = new Articles();
        $article = $articles->getById($id);
        include 'views/article.php';

    }
}
?>