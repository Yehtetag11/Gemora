<?php require_once "nevbar.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";

$id = $_GET['id'];
$products = get_product_id($pdo, $id);
?>

<div class="createbg">
    <div class="blurbg">
        <div class="createbg2">
            <div class="create">
                <form action="" method="post" enctype="multipart/form-data" class="form">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="product_name" class="input" value="<?=$products['name']?>">

                    <label for="material">Material</label>
                    <select name="material" id="material" class="input" >
                        <option value="gold" <?php echo $products['material'] == 'gold' ? 'selected' : ''; ?>>Gold</option>
                        <option value="silver"<?php echo $products['material'] == 'silver' ? 'selected' : ''; ?>>Silver</option>
                    </select>

                    <label for="category">Category</label>
                    <select name="category" id="category" class="input">
                        <option value="earing" <?php echo $products['category'] == 'earing' ? 'selected' : ''; ?>>Earings</option>
                        <option value="ring" <?php echo $products['category'] == 'ring' ? 'selected' : ''; ?>>Ring</option>
                        <option value="necklace" <?php echo $products['category'] == 'necklace' ? 'selected' : ''; ?>>Necklace</option>
                        <option value="charm" <?php echo $products['category'] == 'charm' ? 'selected' : ''; ?>>Charms</option>
                        <option value="bracelet" <?php echo $products['category'] == 'bracelet' ? 'selected' : ''; ?>>Bracelets</option>
                    </select>

                    <label for="price">Price(USD)</label>
                    <input type="text" id="price" name="product_price" class="input" value="<?=$products['price']?>">

                    <label for="description">Description</label>
                    <textarea name="product_description" id="description" class="inputdis"><?=$products['description']?></textarea>

                    <label for="stock">Stock</label>
                    <input type="text" id="stock" name="product_stock" class="input" value="<?=$products['stock']?>">

                    <label for="image">Image</label>
                    <div class="file">
                        <input type="file" id="image" name="product_image">
                    </div>
                    <div class="btn">
                        <button type="submit" name="save_product" class="btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

require_once "../Admin/database/data_connection.php";

if (isset($_POST['save_product'])) {
    $productname = $_POST['product_name'];
    $productmaterial = $_POST['material'];
    $productcategory = $_POST['category'];
    $productprice = $_POST['product_price'];
    $productdescription = $_POST['product_description'];
    $productstock = $_POST['product_stock'];
    $productimg = $_FILES['product_image']['name'];
    $tmp_name = $_FILES['product_image']['tmp_name'];

    // If a new image is uploaded, move it to the directory
    if (!empty($productimg)) {
        $target_dir = "../Assets/productimg/" . $productimg;
        move_uploaded_file($tmp_name, $target_dir);
    } else {
        // If no new image is uploaded, keep the old image
        $stmt = $pdo->prepare("SELECT img_url FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $productimg = $row['img_url']; // Retain old image
    }

    // Update query
    $sql = "UPDATE products 
            SET name = :name, material = :material, category = :category, 
                price = :price, description = :description, stock = :stock, img_url = :img_url 
            WHERE id = :id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $productname);
        $stmt->bindParam(':material', $productmaterial);
        $stmt->bindParam(':category', $productcategory);
        $stmt->bindParam(':price', $productprice);
        $stmt->bindParam(':description', $productdescription);
        $stmt->bindParam(':stock', $productstock);
        $stmt->bindParam(':img_url', $productimg);
        $stmt->execute();
        
        header("Location: allproduct.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
