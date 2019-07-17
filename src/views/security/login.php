<?php include_once "../src/views/layout/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
        
            <h2><?= $pageTitle ?></h2>

            <form method="post" class="mb-4 mt-4">
            
                <div class="form-group">
                    <label for="login">Identifiant</label>
                    <input type="email" class="form-control" name="login" id="login">
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-block btn-success">connexion</button>

            </form>

            <div class="mb-4">
                <a href="<?= url("register") ?>">Je n'ai pas encore de compte</a> <br>
                <a href="<?= url("forgotten_password") ?>">J'ai oublié mon mot de passe</a>
            </div>

        </div>
    </div>
</div>

<?php include_once "../src/views/layout/footer.php" ?>