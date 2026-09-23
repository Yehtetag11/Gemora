<?php 
require_once "../Admin/database/data_connection.php";
require_once "nevbar.php";
require_once "../Admin/database/methods.php";

$orders = get_order($pdo);

if (isset($_GET['query'])) {
    $search = "%" . $_GET['query'] . "%";
    $search_int = (int)$_GET['query'];

    $sql = "SELECT * FROM orders 
            WHERE order_id = :search_int
            OR user_id = :search_int
            OR name LIKE :search 
            OR country LIKE :search 
            OR city LIKE :search
            OR payment LIKE :search";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    $stmt->bindParam(':search_int', $search_int, PDO::PARAM_INT);
    $stmt->execute();

    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="searchbtn">
    <form class="d-flex" role="search" method="GET" action="search_order.php">
        <input class="form-control srch" type="search" name="query" placeholder="Search..." required>
        <button class="btn" type="submit"></button>
    </form>
</div>
<div class="bgdiv2">
    <table class="table2">
        <thead>
            <tr class="pdtitle2">
                <th class="pddetail2">Order ID</th>
                <th class="pddetail2">User ID</th>
                <th class="pddetail2">Total Amount</th>
                <th class="pddetail2">User Name</th>
                <th class="pddetail2">Email Address</th>
                <th class="pddetail2">Country</th>
                <th class="pddetail2">City</th>
                <th class="pddetail2">Payment</th>
                <th class="pddetail2">Order Date</th>
                <th class="pddetail2">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($orders)): ?>
                <tr>
                    <td colspan="10" style="text-align: center;">No orders found.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['order_id']); ?></td>
                        <td><?= htmlspecialchars($order['user_id']); ?></td>
                        <td>$<?= htmlspecialchars($order['total_amount']); ?></td>
                        <td><?= htmlspecialchars($order['name']); ?></td>
                        <td><?= htmlspecialchars($order['email']); ?></td>
                        <td><?= htmlspecialchars($order['country']); ?></td>
                        <td><?= htmlspecialchars($order['city']); ?></td>
                        <td><?= htmlspecialchars($order['payment']); ?></td>
                        <td><?= htmlspecialchars($order['order_date']); ?></td>
                        <td>
                            <a href="orderdelete.php?id=<?= $order['order_id'] ?>" class="delbtn" onclick="return confirm('Are you sure you want to delete this order?');">
                                <img class="delimg" src="../Assets/img/delete.png" alt="Delete">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
