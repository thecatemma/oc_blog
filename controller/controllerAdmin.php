<?php
//Controleur qui gère la vue admin
class ControleurAdmin {

  private $_article;
  private $_commentaire;

  public function __construct() {
    $this->_article = new ArticleManager();
    $this->_commentaire = new CommentaireManager();
  }

}