        <div class="jumbotron jumbotron-fluid">
            <h1 class="chapter">Chapitres</h1>
            <?php foreach ($chapters->fetchAll() as $k => $data): ?>
            <h2 class="title"><strong><?= htmlspecialchars($data->title) ?></strong></h2>
            <p class="date">le <?= $data->date_fr ?></p>
            <p><?= substr($data->content, 0, 200) ?> ... <a href="?action=chapter&amp;id=<?= $data->id ?>">Lire la suite</a></p>
            <?php if (($k +1) < $chapters->rowCount()): echo '<hr>'; endif; endforeach; ?>
        </div>