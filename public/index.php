<?php
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
define('ROOT', dirname(__DIR__) . DS);
define('APP', ROOT . 'src' . DS);
define('WWW_ROOT', ROOT . 'public' . DS);
define('VIEWS', APP . 'View' . DS);
if (session_status() == PHP_SESSION_NONE):
    session_start();
endif;
if (file_exists(ROOT . 'vendor' . DS . 'autoload.php')) {
    require ROOT . 'vendor' . DS . 'autoload.php';
}
if (!class_exists('AlaskaBlog\Controller\Frontend')) {
    require APP . 'Controller' . DS . 'Frontend.php';
}
if (!class_exists('AlaskaBlog\Controller\AdminManager')) {
    require APP . 'Controller' . DS . 'Backend.php';
}
$frontend = new AlaskaBlog\Controller\Frontend();
$backend = new AlaskaBlog\Controller\Backend();
try {
    if (isset($_GET['action'])):
        switch ($_GET['action']):
            case 'connexion':
                include VIEWS . 'Frontend' . DS . 'connexion.php';
                break;
            case 'login':
                if (!empty($_POST['login']) AND !empty($_POST['password'])):
                    $frontend->checkLogin($_POST['login'], $_POST['password']);
                else:
                    $frontend->setFlash('Veuillez remplir tous les champs', 'danger');
                    $frontend->redirect('?action=connexion');
                endif;
                break;
            case 'chapter':
                if (isset($_GET['id']) && $_GET['id'] > 0):
                    $frontend->chapter($_GET['id']);
                else:
                    $frontend->setFlash('Aucun identifiant de chapitre envoyé', 'info');
                    $frontend->redirect($frontend->getReferer());
                endif;
                break;
            case 'comment':
                if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && $_GET['id'] > 0):
                    $frontend->comment($_GET['id']);
                elseif ($_SERVER['REQUEST_METHOD'] === 'POST'):
                    switch ($_POST['_method']):
                        case 'POST':
                            $frontend->addComment($_POST['id'], $_POST['author'], $_POST['comment']);
                            break;
                        case 'PUT':
                            if ($backend->isAdmin()):
                                $backend->approveComment($_POST['id']);
                            else:
                                $frontend->redirect($frontend->getReferer());
                            endif;
                            break;
                        case 'DELETE':
                            if ($backend->isAdmin()):
                                $backend->deleteComment($_POST['id']);
                            else:
                                $frontend->redirect($frontend->getReferer());
                            endif;
                            break;
                    endswitch;
                endif;
                break;
            case 'signal':
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id']) && $_POST['id'] > 0):
                    $frontend->signalComment($_POST['id']);
                else:
                    $frontend->setFlash('Votre requête n\'a pu aboutir :(', 'danger');
                    $frontend->redirect($frontend->getReferer());
                endif;
                break;
            case 'dashboard':
                $backend->listChaptersBackend();
                break;
            case 'add':
                require VIEWS . 'Backend' . DS . 'Chapters' . DS . 'add.php';
                break;
            case 'chapterBackend':
                if (isset($_GET['id']) && $_GET['id'] > 0):
                    $backend->chapterBackend();
                else:
                    $backend->setFlash('Aucun identifiant de chapitre envoyé', 'danger');
                    $backend->redirect($backend->getReferer());
                endif;
                break;
            case 'addChapter':
                if (!empty($_POST['title']) && !empty($_POST['content'])):
                    $backend->addChapter($_POST['title'], $_POST['content']);
                else:
                    $frontend->setFlash('Tous les champs ne sont pas remplis !', 'danger');
                endif;
                break;
            case 'modifyChapter':
                if (isset($_GET['id']) && $_GET['id'] > 0):
                    if (!empty($_POST['title']) && !empty($_POST['content'])):
                        $backend->modifyChapter($_GET['id'], $_POST['title'], $_POST['content']);
                    else:
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    endif;
                else:
                    throw new Exception('Aucun identifiant de chapitre envoyé');
                endif;
                break;
            case 'deleteChapter':
                if (isset($_POST['id']) && (int)$_POST['id'] > 0):
                    $backend->deleteChapter($_POST['id']);
                else:
                    throw new Exception('Aucun identifiant de chapitre envoyé');
                endif;
                break;
            case 'signals':
                $backend->signalCommentBackend();
                break;
            case 'deleteComment':
                if (isset($_GET['id']) && $_GET['id'] > 0):
                    $backend->deleteComment($_GET['id']);
                else:
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                endif;
                break;
            case 'approve':
                if (isset($_GET['id']) && $_GET['id'] > 0):
                    $backend->approveComment($_GET['id']);
                else:
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                endif;
                break;
            case 'logout':
                $backend->logOut();
                break;
            default:
                header('Location: /');
                break;
        endswitch;
    else:
        $frontend->listChapters();
    endif;
} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}