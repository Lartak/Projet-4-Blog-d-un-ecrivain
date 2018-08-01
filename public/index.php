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
try {
    if (isset($_GET['action'])):
        switch ($_GET['action']):
            case 'connexion':
                include VIEWS . 'Frontend' . DS . 'connexion.php';
                break;
            case 'login':
                if ($frontend->getMethod() === 'POST' && !empty($_POST['login']) && !empty($_POST['password'])):
                    $frontend->checkLogin($_POST['login'], $_POST['password']);
                else:
                    $frontend->setFlash('Veuillez remplir tous les champs', $frontend::FLASH_WARNING);
                    $frontend->redirect('?action=connexion');
                endif;
                break;
            case 'chapter':
                if (isset($_GET['id']) && $_GET['id'] > 0):
                    $frontend->chapter($_GET['id']);
                else:
                    $frontend->setFlash('Aucun identifiant de chapitre envoyé', $frontend::FLASH_INFO);
                    $frontend->redirect($frontend->getReferer());
                endif;
                break;
            case 'comment':
                if ($frontend->getMethod() === 'GET' && isset($_GET['id']) && $_GET['id'] > 0):
                    $frontend->comment($_GET['id']);
                elseif ($frontend->getMethod() === 'POST'):
                    if ($frontend->getMethod(true) === 'POST'):
                        $frontend->addComment($_POST['id'], $_POST['author'], $_POST['comment']);
                    elseif(in_array($frontend->getMethod(true), ['PUT', 'DELETE'])):
                        $backend = new AlaskaBlog\Controller\Backend();
                        switch ($backend->getMethod(true)):
                            case 'PUT':
                                $backend->approveComment($_POST['id']);
                                break;
                            case 'DELETE':
                                $backend->deleteComment($_POST['id']);
                                break;
                        endswitch;
                    else:
                        $frontend->redirect($frontend->getReferer());
                    endif;
                else:
                    $frontend->redirect($frontend->getReferer());
                endif;
                break;
            case 'signal':
                if ($frontend->getMethod() === 'POST' && !empty($_POST['id']) && $_POST['id'] > 0):
                    $frontend->signalComment($_POST['id']);
                else:
                    $frontend->setFlash('Votre requête n\'a pu aboutir :(', $frontend::FLASH_ERROR);
                    $frontend->redirect($frontend->getReferer());
                endif;
                break;
            case 'dashboard':
                $backend = new AlaskaBlog\Controller\Backend();
                $backend->listChaptersBackend();
                break;
            case 'add':
                require VIEWS . 'Backend' . DS . 'Chapters' . DS . 'add.php';
                break;
            case 'chapterBackend':
                if (isset($_GET['id']) && $_GET['id'] > 0):
                    $backend = new AlaskaBlog\Controller\Backend();
                    $backend->chapterBackend();
                else:
                    $backend = new AlaskaBlog\Controller\Backend();
                    $backend->setFlash('Aucun identifiant de chapitre envoyé', $frontend::FLASH_ERROR);
                    $backend->redirect($backend->getReferer());
                endif;
                break;
            case 'addChapter':
                if (!empty($_POST['title']) && !empty($_POST['content'])):
                    $backend = new AlaskaBlog\Controller\Backend();
                    $backend->addChapter($_POST['title'], $_POST['content']);
                else:
                    $backend = new AlaskaBlog\Controller\Backend();
                    $backend->setFlash('Tous les champs ne sont pas remplis !', $backend::FLASH_WARNING);
                endif;
                break;
            case 'modifyChapter':
                $backend = new AlaskaBlog\Controller\Backend();
                if (isset($_GET['id']) && $_GET['id'] > 0):
                    if (!empty($_POST['title']) && !empty($_POST['content'])):
                        $backend->modifyChapter($_GET['id'], $_POST['title'], $_POST['content']);
                    else:
                        $backend->setFlash('Tous les champs ne sont pas remplis !', $backend::FLASH_WARNING);
                    endif;
                else:
                    $backend->setFlash('Aucun identifiant de chapitre envoyé', $backend::FLASH_WARNING);
                endif;
                break;
            case 'deleteChapter':
                $backend = new AlaskaBlog\Controller\Backend();
                if (isset($_POST['id']) && (int)$_POST['id'] > 0):
                    $backend->deleteChapter($_POST['id']);
                else:
                    $backend->setFlash('Aucun identifiant de chapitre envoyé', $backend::FLASH_WARNING);
                endif;
                break;
            case 'signals':
                $backend = new AlaskaBlog\Controller\Backend();
                $backend->signalCommentBackend();
                break;
            case 'deleteComment':
                $backend = new AlaskaBlog\Controller\Backend();
                if (isset($_GET['id']) && $_GET['id'] > 0):
                    $backend->deleteComment($_GET['id']);
                else:
                    $backend->setFlash('Aucun identifiant de chapitre envoyé', $backend::FLASH_WARNING);
                endif;
                break;
            case 'approve':
                $backend = new AlaskaBlog\Controller\Backend();
                if (isset($_GET['id']) && $_GET['id'] > 0):
                    $backend->approveComment($_GET['id']);
                else:
                    $backend->setFlash('Aucun identifiant de commentaire envoyé', $backend::FLASH_WARNING);
                endif;
                break;
            case 'logout':
                $backend = new AlaskaBlog\Controller\Backend();
                $backend->logOut();
                break;
            default:
                $frontend->redirect();
                break;
        endswitch;
    else:
        $frontend->listChapters();
    endif;
} catch(Exception $e) {
    $frontend->setFlash($e->getMessage(), $frontend::FLASH_ERROR);
}