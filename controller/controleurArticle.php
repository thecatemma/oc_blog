<?php
// Controleur qui gère les actions relatives aux articles
class ControleurArticle
{
    protected $_article;

    public function __construct() {
        echo('ok');
        $this->_article = new ArticleManager;
    }

}