<?php include_once "../src/views/layout/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-12">

            <h2><?= $pageTitle ?></h2>

            <div class="row">
            <?php foreach($productsModel as $product): ?>
                <div class="col-3">

                    <div class="card">
                        <img src="assets/images/<?= $product['illustration'] ?>" alt="<?= $product['name'] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name'] ?></h5>
                            <p class="lead"><?= $product['description'] ?></p>
                            <p class="lead"><?= $product['price'] ?> &euro;</p>
                            <a href="<?= url("add_to_order") ?>?id=<?= $product['id'] ?>" class="btn btn-block btn-success">Ajouter au panier</a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>

<?php include_once "../src/views/layout/footer.php" ?>