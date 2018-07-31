<?php
$title = 'Billet pour l\'Alaska';
ob_start(); ?>
    <div class="container">
        <div class="jumbotron" id="accueil">
            <h1 class="chapter">Billet pour l'Alaska</h1>
            <h2 class="welcome">Bienvenue sur mon blog</h2>
            <div class="row align-items-start">
                <img class="col-4 img-responsive" src="/img/livre.jpg" alt="livre">
                <p class="col-8 lead" id="bienvenue">
                    Pour mon nouveau livre "Billet pour l'Alaska", je souhaiterai vous inviter à collaborer avec moi.
                    <br>
                    Comment? Tout simplement en me laissant vos commentaires sur les chapitres que je mettrai en ligne.
                    <br>
                    Vos commentaires seront une matière précieuse pour nourrir mon imagination.
                    <br>Vous respecterez, bien entendu, un minimum de règles élémentaires juridiques et/ou de courtoisie
                    <em class="text-muted">(je me reserve le droit de supprimer ou non tous commentaires signalés)</em>.
                    <br>
                    Une nouvelle forme d'écriture, d'échanges entre les lecteurs et l'auteur.
                </p>
            </div>
        </div>
<?php
include VIEWS . 'flash.php';
include VIEWS . 'Frontend' . DS . 'Chapters' . DS . 'index.php';
?>
    </div>
<?php
$content = ob_get_clean();
require VIEWS . 'Frontend' . DS . 'template.php';