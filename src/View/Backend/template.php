<?php
/**
 * @var \PDORow $chapter
 */
$chapterManager = new AlaskaBlog\Model\ChapterManager();
$chapters = $chapterManager->findAll();
$Backend = new AlaskaBlog\Controller\Backend();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?> &raquo; <?= $Backend->getName() ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
        <link href="/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="/img/fond.ico">
    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar">
        <header>
            <nav class="navbar navbar-expand-lg navbar fixed-top navbar-dark bg-dark">
                <a class="navbar-brand" href="?action=dashboard">Administration</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chapitres</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php foreach ($chapters->fetchAll() as $chapter): ?>
                                    <a class="dropdown-item" href="?action=chapterBackend&amp;id=<?= $chapter->id ?>"><?= $chapter->title ?></a>
                                <?php endforeach; ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?action=add" data-toggle="tooltip" data-original-title="Ajouter un chapitre"><i class="fa fa-plus"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?action=signals" data-toggle="tooltip" data-original-title="Commentaires signalés"><i class="fa fa-bell"></i></a>
                        </li>
                    </ul>
                    <?php if ($_GET['action'] === 'chapterBackend' && !empty($_GET['id'])): ?>
                        <form action="?action=deleteChapter" method="post" class="form-inline my-2 my-lg-0">
                            <input type="hidden" name="id" value="<?= $chapter->id ?>">
                            <button class="btn btn-outline-danger btn-sm my-2 my-sm-0" type="submit" data-toggle="tooltip" data-original-title="Supprimer le chapitre"><i class='fa fa-trash'></i></button>
                        </form>
                    <?php endif; ?>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="/" data-toggle="tooltip" data-original-title="Accueil du site"><i class="fa fa-home"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?action=logout" data-toggle="tooltip" data-original-title="Déconnexion"><i class="fa fa-sign-out"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?= $content ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script>jQuery('[data-toggle="tooltip"]').tooltip();</script>
    </body>
</html>