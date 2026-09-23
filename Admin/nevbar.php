<?php session_start();
require_once "../Admin/database/methods.php";
require_once "../Admin/database/data_connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Assets/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid navbar_section">
        <div class="option">
            <a href="dashboard.php" class="op">Dashboard</a>
            <a href="usertable.php" class="op">User table</a>
            <a href="ordertable.php" class="op">Order Management</a>
            <a href="allproduct.php" class="op">Product table</a>

        </div>
        <div class="option2">
            <a href="productcreate.php" class="createp">Create product</a>
            <a href="logout.php" class="logout">Logout</a>
            <?php
            if (isset($_SESSION['id'])):
                $user = get_user_id($pdo, $_SESSION['id']); ?>
                <a class="cta_detail"><img src="../Assets/profileimg/<?= $user['img_url']; ?>" alt="" class="pfp"></a>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>