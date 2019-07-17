<?php include_once "../src/views/layout/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
        
            <h2><?= $pageTitle ?></h2>

            <form method="post" class="mb-4 mt-4" novalidate>
            
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" name="firstname" id="firstname">
                </div>
                
                <div class="form-group">
                    <label for="lastname">NOM</label>
                    <input type="text" class="form-control" name="lastname" id="lastname">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="terms_of_sales" id="terms_of_sales">
                    <label class="form-check-label" for="terms_of_sales">J'accepte les <span>conditions de ventes</span></label>
                </div>

                <button type="submit" class="btn btn-block btn-primary">je m'inscris</button>

            </form>

            <div class="mb-4">
                <a href="<?= url("login") ?>">J'ai déjà un compte</a>
            </div>

        </div>
    </div>
</div>

<?php include_once "../src/views/layout/footer.php" ?>