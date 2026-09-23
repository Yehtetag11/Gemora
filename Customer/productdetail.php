<?php require_once "header.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";
$products = get_product($pdo);
if (isset($_GET['product_id'])) {
    $product=get_product_id($pdo, $_GET['product_id']);
}
?>
<div class="productde">
    <div class="pdbg">
        <div class="pd1">
            <img src="../Assets/productimg/<?= $product['img_url']; ?>" alt="" class="display-normal">
        </div>

        <div class="pd2">
            <div class="pdname"><?= $product['name']; ?></div>

            <div class="matecate">
                <div class="pddes">Price:</div>
                <div class="pdprice2">$<?= $product['price']; ?></div>
            </div>

            <div class="matecate">
                <div class="pdmaterial">Material:</div>
                <div class="pdmaterial2"><?= $product['material']; ?></div>

                <div class="pdcategory">Category:</div>
                <div class="pdcategory2"><?= $product['category']; ?></div>
            </div>

            <div class="matecate">
                <div class="pddes">Description</div>
                <div class="pddes2"><?= $product['description']; ?></div>
            </div>
            
            <div class="pdlink">
                <a href="cart.php?id=<?=$product['id']?>" class="">Add to cart</a>
            </div>
            <div class="bte">
                <a href="viewproduct.php" class=""><img src="../Assets/img/left-chevron.png" alt="">back to exploring</a>
            </div>

        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>