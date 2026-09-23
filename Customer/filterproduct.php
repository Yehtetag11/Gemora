<?php require_once "../Admin/database/data_connection.php";
require_once "header.php";
require_once "../Admin/database/methods.php";

if (isset($_GET['category'])) {

    // Prepare the SQL query to search in multiple columns
    $sql = "SELECT * FROM products
            WHERE category= :category";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':category', $_GET['category']);
    $stmt->execute();

    // Fetch results
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($_GET['category'] == "earing") {
        $title = "Earings";
    }
    else if ($_GET['category'] == "ring") {
        $title = "Rings";
    }
    else if ($_GET['category'] == "bracelet") {
        $title = "Bracelets";
    }
    else if ($_GET['category'] == "necklace") {
        $title = "Necklaces";
    }
    else if ($_GET['category'] == "charm") {
        $title = "Charms";
    }
}
?>
<div class="viewallbg">
</div>
<div class="viewall_page">
    <h1><?=$title?></h1>
    <div class="allrow">
        <?php foreach ($products as $product): ?>
            <div class="allproduct">
                <a href="productdetail.php?product_id=<?=$product['id']?>">
                    <div class="allimg"><img src="../Assets/productimg/<?= $product['img_url']; ?>" alt=""></div>
                    <div class="alltext"><?= $product['name']; ?></div>
                    <div class="alltext">$<?= $product['price']; ?></div>
                    <div class="alltext">Material used - <?= $product['material']; ?></div>
                </a>
                <a class="addtocart" href="cart.php?id=<?= $product['id'] ?>">Add to cart</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once "footer.php"; ?>