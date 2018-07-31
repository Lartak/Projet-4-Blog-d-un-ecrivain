<?php
/**
 * @var object $chapter
 */
$title = 'Administration';
ob_start();
?>
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <h1><?= $chapter->title ?></h1>
        <p class="date"> le <?= $chapter->date_fr ?></p>
        <br>
        <p class="text-justify"><?= $chapter->content ?></p>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <h2 class="chapter"><strong>Commentaires</strong></h2>
        <?php foreach ($chapter->comments as $k => $comment): ?>
        <p>
            <strong><?= htmlspecialchars($comment->author) ?></strong>
            <br><a href="?action=comment&amp;id=<?= $comment->id ?>" class="text-muted">le <?= $comment->date_fr ?></a>
            <?php if ($comment->signal_comment): ?>
                <i class="fa fa-bell text-info float-right" data-toggle="tooltip" data-original-title="Commentaire signalé"></i>
            <?php endif; ?>
        </p>
        <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
        <?php if (($k + 1) < $chapter->comments_count): echo '<hr>'; endif; endforeach; ?>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <h2><strong>Modifier le chapitre</strong></h2>
        <form action="?action=modifyChapter&amp;id=<?= $chapter->id ?>" method="post">
            <input type="hidden" name="id" value="<?= $chapter->id ?>">
            <div class="form-group">
                <label for="title"><strong>Titre</strong></label> : 
                <input class="form-control" type="text" name="title" id="title" value="<?= nl2br(htmlspecialchars($chapter->title)) ?>">
            </div>
            <div class="form-group">
                <label for="content"><strong>Nouveau texte :</strong></label> 
                <textarea id="content" name="content" rows="25" cols="98"><?= nl2br(htmlspecialchars($chapter->content)) ?></textarea>
            </div>
            <input type="submit" value="Modifier" class="btn btn-success btn-block">
        </form>
    </div>
<script type="text/javascript" src="/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">tinyMCE.init({mode:"textareas"});</script>
</div>
<?php
$content = ob_get_clean();
require VIEWS . 'Backend' . DS . 'template.php';