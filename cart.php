<?php require 'inc/head.php'; 

session_start();
require 'inc/data/products.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
    <ul>
    <?php 
                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $cookieId) {
                        $cookie = $catalog[$cookieId];
                        echo '<li>'.$cookie['name'].'</li>';
                    }
                } else {
                    echo '<li>Your cart is empty.</li>';
                }
            ?>
    </ul>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
