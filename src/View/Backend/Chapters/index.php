<?php
$title = 'Administration';
ob_start(); ?>
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <h1>Bienvenue <br> dans la partie administration de votre site!</h1>
        <br><br>
        <p class="lead text-justify">La partie administration est l'endroit du site où vous pourrez gérer la publication, la modification ou la suppression de vos chapitres.
            <br>Vous avez aussi la charge de modérer les "commentaires signalés" laissés sur votre site <em class="text-muted">(<a href="http://eduscol.education.fr/internet-responsable/ressources/legamedia/liberte-d-expression-et-ses-limites.html">rappel de la liberté d'expression et de ses limites</a>)</em></p>
    </div>
    <?php include VIEWS . 'flash.php'; ?>
    <div class="jumbotron jumbotron-fluid">
        <h1 class="chapitre">Chapitres</h1>
            <table class="table table-borderless table-dark">
                <tbody>
                <?php foreach($chapters->fetchAll() as $data): ?>
                    <tr>
                        <td><?= htmlspecialchars($data->title) ?></td><td><a href="?action=chapterBackend&amp;id=<?= $data->id ?>" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Modifier ou supprimer ce chapitre" data-placement="right"><i class="fa fa-edit text-primary"></i> <span class="text-white">/</span> <i class="fa fa-trash text-warning"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody> 
            </table>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <h2><a href="?action=commentSignal" class="btn btn-outline-secondary btn-block">Commentaires signalés</a></h2>
    </div>
    <div class="jumbotron jumbotron-fluid" id="addChapter">
        <h2><strong>Ajouter un chapitre</strong></h2>
        <form action="?action=addChapter" method="post">
            <p>
                <label for="title"><strong>Titre</strong></label> : <input type="text" name="title" id="title" class="form-control">
            </p>
            <p>
                <label for="content"><strong>Nouveau chapitre :</strong></label>
                <textarea id="content" name="content" rows="25" cols="98"></textarea>
            </p>
            <button style="margin-left:150px" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>

<script type="text/javascript" src="/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">tinyMCE.init({mode:"textareas"});</script>
<?php
$content = ob_get_clean();
require VIEWS . 'Backend' . DS . 'template.php';