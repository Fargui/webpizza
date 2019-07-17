<?php include_once "../src/views/layout/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
        
            <h2><?= $pageTitle ?></h2>

            <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div><?= $error ?></div>
            <?php endforeach; ?>
            </div>

            <a href="<?= url("forgotten_password") ?>">recommencer</a>

        </div>
    </div>
</div>

<?php include_once "../src/views/layout/footer.php" ?>