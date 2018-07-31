<?php
$title = 'Administration';
ob_start(); ?>
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
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
    <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
        tinyMCE.init({mode:"textareas"});
    </script>
<?php
$content = ob_get_clean();
require VIEWS . 'Backend' . DS . 'template.php';