<?php
// Controleur qui gère les actions relatives aux commentaires
class ControleurCommentaire {
    private $_commentaire;

    public function __construct() {
        $this->_commentaire = new CommentaireManager;
    }


}