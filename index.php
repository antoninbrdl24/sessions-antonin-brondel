<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; 

session_start(); 
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if(isset($_GET['add_to_cart'])) {
    $cookieId = $_GET['add_to_cart'];

    // Ajouter le cookie à la session
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if(!in_array($cookieId, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $cookieId;
    }
}
?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
