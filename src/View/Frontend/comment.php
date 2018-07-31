<?php
/**
 * @var \PDORow $comment
 */
$title = 'Billet pour l\'Alaska';
ob_start(); ?>
<div class="container commentaire">
    <div class="jumbotron jumbotron-fluid commentaire">
        <?php if (!$comment->signal_comment): ?>
        <form action="?action=signal" method="post" class="form-inline float-right mb-2 mr-sm-2">
            <input type="hidden" name="id" value="<?= $comment->id; ?>">
            <button type="submit" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Signaler ce commentaire"><i class="fa fa-bell"></i></button>
        </form>
        <?php endif; ?>
        <h1>Commentaire</h1>
        <blockquote class="blockquote">
            <strong><?= htmlspecialchars($comment->author) ?></strong>
            <footer class="blockquote-footer">
                <span class="text-muted float-right">le <?= $comment->date_fr ?></span>
                <a href="?action=chapter&amp;id=<?= $comment->chapter_id ?>" class="text-link"><?= $comment->chapter ?></a>
            </footer>
        </blockquote>
        <div class="row">
            <div class="col-12">
                <p class="text-justify"><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require VIEWS . 'Frontend' . DS . 'template.php';