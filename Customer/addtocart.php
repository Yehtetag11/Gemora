<?php require_once "header.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";
if (empty($_SESSION)) session_start();
$cartQty = 0;
$subtotal = 0;
$total = 0;
?>
<div class="atcbg">
    <div class="addtocartbg">
        <?php
        if (empty($_SESSION['cart'])):
        ?>
        <?php
        else:
        ?>
            <div class="addtocartbg2">
                <h1>Items in My Bag</h1>
                <div class="addtitle">
                    <span class="addproduct">Product</span>
                    <span class="addname">Name</span>
                    <span class="addmaterial">Unit Price</span>
                    <span class="addcategory">Quantity</span>
                    <span class="addprice">Final Price</span>
                    <span class=""></span>
                </div>
                <?php if (!empty($_SESSION['cart'])):
                    foreach ($_SESSION['cart'] as $product): ?>
                        <div class="addrow">
                            <span class="addproduct">
                                <img src="../Assets/productimg/<?= $product['img_url']; ?>" alt="">
                            </span>
                            <span class="addname"><?= $product['name']; ?></span>
                            <span class="addmaterial">$<?= number_format($product['price'], 2); ?></span>

                            <span class="addcategory">
                                <form action="update_cart.php" method="POST" class="quantity-form">
                                    <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                    <button type="submit" name="decrease" class="qty-btn">−</button>
                                    <input type="text" name="quantity" value="<?= $product['qty']; ?>" class="qty-input" readonly>
                                    <button type="submit" name="increase" class="qty-btn">+</button>
                                </form>
                            </span>
                            <span class="addprice">$<?= number_format($product['price'] * $product['qty'], 2); ?></span>
                            <a href="removecart.php?id=<?= $product['id']; ?>" class="remove">Remove</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="sum">
            <?php
            if (empty($_SESSION['cart'])):
            ?>
                <p>An empty cart? Let’s add a little sparkle!</p>
                <div class="backe">
                    <a href="viewproduct.php" class=""><img src="../Assets/img/left-chevron.png" alt="">back to exploring</a>
                </div>
            <?php
            else:
            ?>
                <h2>Order Summary</h2>
                <?php
                $total = 0;
                $itemcost = 0;
                $tax = 0;
                foreach ($_SESSION['cart'] as $product) {
                    $tax += $product['price'] * $product['qty'] / 100 * 5;
                    $itemcost += $product['price'] * $product['qty'];
                    $total += $product['price'] * $product['qty'] + 20 + $tax;
                }
                ?>
                <div class="sum2">
                    <table cellpadding="10" cellspacing="0">
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                        <tr>
                            <td><strong>Items Cost</strong></td>
                            <td>$<?= number_format($itemcost, 2); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tax (5%)</strong></td>
                            <td>$<?= number_format($tax, 2); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Shipping Fees</strong></td>
                            <td>$20.00</td>
                        </tr>
                        <tr>
                            <td><strong>Total cost</strong></td>
                            <td>$<?= number_format($total, 2); ?></td>
                        </tr>
                    </table>
                </div>
                <a href="checkout.php" class="checkout">Proceed to checkout</a>
                <div class="backe">
                    <a href="viewproduct.php" class=""><img src="../Assets/img/left-chevron.png" alt="">back to exploring</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>

<?php require_once "footer.php"; ?>