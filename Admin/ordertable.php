<?php
require_once "nevbar.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";
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
            <?php
            $orders = get_order($pdo);
            foreach ($orders as $order):
            ?>
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
            <?php endforeach ?>
        </tbody>
    </table>
</div>