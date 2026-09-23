<?php require_once "nevbar.php"; ?>

<div class="createbg">
    <div class="blurbg">
        <div class="createbg2">
            <div class="create">
                <form action="" method="post" enctype="multipart/form-data" class="form">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="product_name" class="input">

                    <label for="material">Material</label>
                    <select name="material" id="material" class="input">
                        <option value="gold">Gold</option>
                        <option value="silver">Silver</option>
                    </select>

                    <label for="category">Category</label>
                    <select name="category" id="category" class="input">
                        <option value="earing">Earings</option>
                        <option value="ring">Ring</option>
                        <option value="necklace">Necklace</option>
                        <option value="charm">Charms</option>
                        <option value="bracelet">Bracelets</option>
                    </select>

                    <label for="price">Price(USD)</label>
                    <input type="text" id="price" name="product_price" class="input">

                    <label for="description">Description</label>
                    <textarea name="product_description" id="description" class="inputdis"></textarea>

                    <label for="stock">Stock</label>
                    <input type="text" id="stock" name="product_stock" class="input">

                    <label for="image">Image</label>
                    <div class="file">
                        <input type="file" id="image" name="product_image">
                    </div>
                    <div class="btn">
                        <button type="submit" name="save_product" class="btn">Create</button>
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

    $target_dir = "../Assets/productimg/" . $productimg;

    move_uploaded_file($tmp_name, $target_dir);

    $sql = "INSERT INTO products(name, material, category, price, description, stock, img_url)
            VALUES (:name, :material, :category, :price, :description, :stock, :img_url)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam('name', $productname);
        $stmt->bindParam('material', $productmaterial);
        $stmt->bindParam('category', $productcategory);
        $stmt->bindParam('price', $productprice);
        $stmt->bindParam('description', $productdescription);
        $stmt->bindParam('stock', $productstock);
        $stmt->bindParam('img_url', $productimg);
        $stmt->execute();
        header("Location: allproduct.php");
        exit;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>