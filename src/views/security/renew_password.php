<?php include_once "../src/views/layout/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
        
            <h2><?= $pageTitle ?></h2>

            <form method="post" class="mb-4 mt-4">
            
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Mot de passe</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>

                <button type="submit" class="btn btn-block btn-success">modifier mon mot de passe</button>

            </form>

            <div class="mb-4">
                <a href="<?= url("login") ?>">Je me connect</a>
            </div>

        </div>
    </div>
</div>

<?php include_once "../src/views/layout/footer.php" ?>