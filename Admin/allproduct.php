<?php require_once "nevbar.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";
?>
<div class="searchbtn">
    <form class="d-flex" role="search" method="GET" action="search_product.php">
        <input class="form-control srch" type="search" name="query" placeholder="Search..." required>
        <button class="btn" type="submit"></button>
    </form>
</div>

<div class="bgdiv2">
    <table class="table2">
        <thead>
            <tr class="pdtitle2">
                <th class="pddetail2">ID</th>
                <th class="pddetail2">Product</th>
                <th class="pddetail2">Name</th>
                <th class="pddetail2">Material</th>
                <th class="pddetail2">Category</th>
                <th class="pddetail2">Price(USD)</th>
                <th class="pddetail2">Description</th>
                <th class="pddetail2">Stock</th>
                <th class="pddetail2">Edit</th>
                <th class="pddetail2">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $products = get_product($pdo);
            foreach ($products as $product):
            ?>
                <tr>
                    <td><?= $product['id']; ?></td>
                    <td scope="row">
                        <img class="pdimg" src="../Assets/productimg/<?= $product['img_url']; ?>" alt="">
                    </td>
                    <td><?= $product['name']; ?></td>
                    <td><?= $product['material']; ?></td>
                    <td><?= $product['category']; ?></td>
                    <td><?= $product['price']; ?></td>
                    <td><?= $product['description']; ?></td>
                    <td><?= $product['stock']; ?></td>
                    <td>
                        <a href="product_update.php?id=<?= $product['id'] ?>" class="btn">
                            <img class="editimg" src="../Assets/img/edit.png" alt="">
                        </a>
                    </td>
                    <td>
                        <a href="product_delete.php?id=<?= $product['id'] ?>" class="delbtn" onclick="return confirm('Are you sure you want to delete this product?');">
                            <img class="delimg" src="../Assets/img/delete.png" alt="">
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>