<?php
/**
 * @var \PDORow $chapter
 */
$title = 'Administration';
ob_start(); ?>
<div class="container">
   <div class="jumbotron jumbotron-fluid">
        <h2><strong>Ajouter un chapitre</strong></h2>
            <form action="?action=deleteChapter" method="post">
                <label for="title"><strong>Titre</strong></label> : <input type="text" name="title" id="title"><br><br>
                <label for="content"><strong>Chapitre :</strong></label> 
                <textarea id="content" name="content" rows="25" cols="150"><?= nl2br(htmlspecialchars($chapter->title)) ?><br><br><?= nl2br(htmlspecialchars($chapter->content)) ?></textarea>
            <br><br>
            </form>
            <button style="margin-left:150px">Supprimer</button>
    </div>
</div>

<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({mode:"textareas"});
</script>
<?php
$content = ob_get_clean();
require VIEWS . 'Backend' . DS . 'template.php';