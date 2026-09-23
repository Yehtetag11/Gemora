<?php require_once "header.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";
if (empty($_SESSION)) session_start();
$total = 0;
$itemcost = 0;
$tax = 0;
foreach ($_SESSION['cart'] as $product) {
    $tax += $product['price'] * $product['qty'] / 100 * 5;
    $itemcost += $product['price'] * $product['qty'];
    $total += $product['price'] * $product['qty'] + 20 + $tax;
}
?>
<div class="atcbg">
    <div class="ptcobg">
        <div class="ptcobg2">
            <h1>Items in My Bag</h1>
            <div class="ptcotitle">
                <span class="addproduct">Product</span>
                <span class="addname">Name</span>
                <span class="addmaterial">Unit Price</span>
                <span class="addcategory">Quantity</span>
                <span class="addprice">Final Price</span>
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
                            <input type="text" name="quantity" value="<?= $product['qty']; ?>" class="qty-input" readonly>
                        </span>
                        <span class="addprice">$<?= number_format($product['price'] * $product['qty'], 2); ?></span>
                    </div>
                <?php endforeach; ?>
                <div class="finaltotal">Final price: <span>$<?= $total; ?></span></div>
            <?php endif; ?>
        </div>

        <form class="ptcoinfo" method="post">
            <div class="ptcoinfoname1">
                <h5>Name</h5>
                <div class="ptcousername">
                    <input type="text" placeholder="Enter your name" class="ptcoinput" name="name" required>
                </div>
            </div>
            <div class="ptcoinfoname2">
                <h5>Email</h5>
                <div class="ptcousername">
                    <input type="text" placeholder="yourname@example.com" class="ptcoinput" name="email" required>
                </div>
            </div>
            <div class="ptcoinfoname3">
                <h5>Address</h5>
                <div class="ptcoaddress">
                    <input type="text" placeholder="Country" name="country" required>
                    <input type="text" placeholder="City" name="city" required>
                </div>
            </div>
            <div class="ptcoinfoname4">
                <h5>Payment method</h5>
                <div class="ptcoaddress">
                    <select name="payment" id="category" class="ptcoinput" required>
                        <option value="mastercard">Mastercard</option>
                        <option value="paypal">Paypal</option>
                        <option value="applepay">Applepay</option>
                        <option value="visa">Visa</option>
                        <option value="KBZpay">KBZpay</option>
                        <option value="AYApay">AYApay</option>
                    </select>
                </div>
            </div>
            <div class="confirm">
                <button type="submit" name="submit" class="">Confirm order</button>
            </div>
            <div class="backe">
                <a href="addtocart.php" class=""><img src="../Assets/img/left-chevron.png" alt="">back to cart</a>
            </div>
        </form>
    </div>
</div>
</body>

<?php
if (isset($_POST['submit'])) {
    $user_id = $_SESSION['id'];
    $name = $_POST['name'];
    $email  = $_POST['email'];
    $country  = $_POST['country'];
    $city  = $_POST['city'];
    $payment  = $_POST['payment'];

    $sql = "INSERT INTO orders (user_id, total_amount, name, email, country, city, payment) 
            VALUES (:user_id, :total_amount, :name, :email, :country, :city, :payment)";

    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':total_amount', $total);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':payment', $payment);

    // Execute the statement
    if ($stmt->execute()) {
        $order_id = $pdo->lastInsertId();
        $sql2 = "INSERT INTO order_details (order_id, product_id, quantity, sub_total) 
         VALUES (:order_id, :product_id, :quantity, :sub_total)";
        $stmt2 = $pdo->prepare($sql2);

        foreach ($_SESSION['cart'] as $product) {
            $subtotal = number_format($product['price'] * $product['qty'], 2); // Calculate subtotal first
            $stmt2->bindParam(':order_id', $order_id);
            $stmt2->bindParam(':product_id', $product['id']);
            $stmt2->bindParam(':quantity', $product['qty']);
            $stmt2->bindParam(':sub_total', $subtotal);
            $stmt2->execute();
        }
        $_SESSION['order_id'] = $order_id;
        echo "<script>window.location.href='orderdetail.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error placing order. Please try again.');</script>";
    }
}
?>

<?php require_once "footer.php"; ?>