<?php require_once "header.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";
if (empty($_SESSION)) session_start();
$order = get_order_id($pdo, $_SESSION['order_id']);
?>

<div class="confirmation-container">
    <div class="confirmation-box">
        <h1>Order Confirmed!</h1>
        <p>Thank you for your purchase. Your order has been successfully placed.</p>

        <div class="order-summary">
            <h2>Order Summary</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Final Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($_SESSION['cart'])):
                        $total = 0;
                        foreach ($_SESSION['cart'] as $product):
                            $sub = $product['price'] * $product['qty'];
                            $final = $sub + $sub/100*5+20;
                            $total += $final;
                    ?>
                            <tr>
                                <td><img src="../Assets/productimg/<?= $product['img_url']; ?>" alt=""></td>
                                <td><?= $product['name']; ?></td>
                                <td><?= $product['qty']; ?></td>
                                <td>$<?= number_format($sub, 2); ?></td>
                                <td>$<?= number_format($final, 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="total-row">
                            <td colspan="4"><strong>Grand Total:</strong></td>
                            <td><strong>$<?= number_format($total, 2); ?></strong></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="customer-info">
            <h2>Customer Details</h2>
            <p><strong>Name:</strong> <?= $order['name'] ?? "Not Provided"; ?></p>
            <p><strong>Email:</strong> <?= $order['email'] ?? "Not Provided"; ?></p>
            <p><strong>Country:</strong> <?= $order['country'] ?? "Not Provided"; ?></p>
            <p><strong>City:</strong> <?= $order['city'] ?? "Not Provided"; ?></p>
            <p><strong>Payment Method:</strong> <?= $order['payment'] ?? "Not Provided"; ?></p>
        </div>


        <div class="buttons">
            <a href="home.php" class="back-shop">Continue exploring</a>
        </div>
    </div>
</div>

<?php
unset($_SESSION['cart']);
?>

<?php require_once "footer.php"; ?>