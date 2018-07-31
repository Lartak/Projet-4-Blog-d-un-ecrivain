<?php
$title = 'Administration';
ob_start(); ?>
    <div class="container">
        <div class="jumbotron jumbotron-fluid mot_de_passe">
            <h1 class="pass">Mot de passe</h1>
            <h3>Veuillez remplir ces champs avec votre login et votre mot de passe pour accéder à la partie
                administration de votre site</h3>
            <h6 style="text-align:center">si votre mot de passe est erroné, vous reviendrez sur cette page ;)</h6>
            <?php require VIEWS . 'flash.php'; ?>
            <form name="password" id="password" action="?action=login" method="post" class="form-inline">
                <label for="login">Login : </label>
                <input type="text" name="login" id="login" class="form-control mb-2 mr-sm-2" placeholder="Login" required/>
                <label for="password">Mot de passe : </label>
                <input type="password" name="password" id="password" class="form-control mb-2 mr-sm-2" placeholder="Mot de passe" required/>
                <input type="submit" name="connexion" value="Connexion" class="btn btn-primary"/>
            </form>
            <div class="row">
                <div class="col-6">
                    <span class="text-muted">Les identifiants pour accéder à l'administration sont :</span>
                </div>
                <div class="col-6">
                    <ul class="list-unstyled text-muted">
                        <li>Login : Forteroche</li>
                        <li>Mot de passe : admin</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
require VIEWS . 'Frontend' . DS . 'template.php';