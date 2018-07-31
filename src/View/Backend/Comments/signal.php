<?php
/**
 * @var \PDOStatement $comments
 */
$title = 'Administration';
ob_start(); ?>
    <div class="container">
        <div class="jumbotron jumbtron-fluid">
            <h1>Commentaires signalés</h1>
            <div class="table-responsive">
                <table class="table table-bordeless table-hover table-dark">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Chapitre</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Date</th>
                        <th scope="col" colspan="3">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($comments->fetchAll() as $comment): ?>
                        <tr>
                            <td><?= htmlspecialchars($comment->title) ?></td>
                            <td><?= htmlspecialchars($comment->author) ?></td>
                            <td><?= htmlspecialchars($comment->date_fr) ?></td>
                            <td>
                                <a href="?action=comment&amp;id=<?= $comment->id ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                <form action="?action=comment" method="POST" class="form-inline mb-2 mr-sm-2">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="id" value="<?= $comment->id ?>">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-thumbs-up"></i></button>
                                </form>
                                <form action="?action=comment" method="POST" class="form-inline mb-2 mr-sm-2">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?= $comment->id ?>">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
require VIEWS . 'Backend' . DS . 'template.php';