<?php
/**
 * @var \PDORow $chapter
 */
$title = 'Billet pour l\'Alaska';
ob_start();
$comments = new stdClass();
$comments->title = '<strong>';
if ($chapter->comments_count == 0):
    $comments->title .= 'Aucun commentaire actuellement';
    $comments->message = 'Soyez le premier à commenter le chapitre !';
else:
    $comments->title .= $chapter->comments_count == 1 ? 'Commentaire</strong>' : 'Commentaires</strong> <em class="text-muted">(' . $chapter->comments_count . ')</em>';
    $comments->message = 'Ajoutez un commentaire si vous le voulez!';
endif;
?>
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <h1 class="chapter"><?= htmlspecialchars($chapter->title) ?></h1>
        <p class="date">le <?= $chapter->date_fr ?></p>
        <p class="text-justify"><?= $chapter->content ?></p>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <h2><?= $comments->title ?></h2>
        <?php foreach ($chapter->comments as $k => $comment): ?>
            <blockquote class="blockquote">
                <?php if (!$comment->signal_comment): ?>
                    <form action="?action=signal" class="form-inline float-right" method="post">
                        <input type="hidden" name="id" value="<?= $comment->id; ?>">
                        <button class="btn btn-outline-danger">Signaler</button>
                    </form>
                <?php endif; ?>
                <p class="mb-0">
                    <strong><?= htmlspecialchars($comment->author) ?></strong>
                </p>
                <footer class="blockquote-footer">
                    <a href="?action=comment&amp;id=<?= $comment->id; ?>" class="text-muted">le <?= $comment->date_fr ?></a>
                </footer>
            </blockquote>
            <div class="row">
                <div class="col-12">
                    <p class="text-justify"><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
                </div>
            </div>
        <?php if (($k + 1) < $chapter->comments_count): echo '<hr>'; endif; endforeach; ?>
        <hr>
        <h3><?= $comments->message ?></h3>
        <form action="?action=comment" method="post" class="row">
            <input type="hidden" name="id" value="<?= $chapter->id ?>">
            <input type="hidden" name="_method" value="POST">
            <div class="col-5">
                <label for="comment">Commentaire</label>
                <textarea id="comment" name="comment" class="form-control" placeholder="Votre commentaire ici ..." required></textarea>
            </div>
            <div class="col-5">
                <label for="author">Auteur</label>
                <div class="input-group">
                    <input type="text" id="author" name="author" class="form-control" placeholder="Votre pseudonyme" required>
                    <div class="input-group-append">
                        <input type="submit" class="btn btn-outline-secondary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
require VIEWS . 'Frontend' . DS . 'template.php';
