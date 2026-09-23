<?php require_once "header.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";
$products = get_product($pdo);
?>
<div class="viewallbg">

</div>
<div class="viewall_page">
    <h1>All Product</h1>
    <div class="allrow">
        <?php foreach ($products as $product): ?>
            <div class="allproduct">
                <a href="productdetail.php?product_id=<?=$product['id']?>">
                    <div class="allimg"><img src="../Assets/productimg/<?= $product['img_url']; ?>" alt=""></div>
                    <div class="alltext"><?= $product['name']; ?></div>
                    <div class="alltext">$<?= $product['price']; ?></div>
                    <div class="alltext">Material used - <?= $product['material']; ?></div>
                </a>
                <a class="addtocart" href="cart.php?id=<?=$product['id']?>">Add to cart</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once "footer.php"; ?>