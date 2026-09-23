<?php
require_once "header.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";

if (empty($_SESSION)) session_start();

// Fetch order details including order date
try {
    $sql = "SELECT od.id, od.order_id, od.product_id, p.name AS product_name, od.quantity, od.sub_total, o.order_date 
            FROM order_details od
            JOIN products p ON od.product_id = p.id
            JOIN orders o ON od.order_id = o.order_id
            ORDER BY o.order_date DESC";
    $stmt = $pdo->query($sql);
    $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching order details: " . $e->getMessage();
}
?>

<div class="atcbg">
    <div class="addtocartbg">
        <div class="addtocartbg2">
            <h2 class="oh">Order History</h2>
            
            <table class="order-history-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Subtotal ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orderDetails)) : ?>
                        <?php foreach ($orderDetails as $order) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                                <td><?php echo htmlspecialchars(date("F j, Y", strtotime($order['order_date']))); ?></td>
                                <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                                <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                                <td>$<?php echo number_format($order['sub_total'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5">No orders found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
<?php require_once "footer.php"; ?>
