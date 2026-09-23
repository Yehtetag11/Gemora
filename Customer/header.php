<?php session_start();
require_once "../Admin/database/methods.php";
require_once "../Admin/database/data_connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Assets/gemora.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid navbar_section">
        <div class="logo">
            <a href="home.php"><img src="../Assets/img/Gemora_Black.png" alt=""></a>
        </div>
        <button class="navToggle" aria-label="Toggle menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
        <div class="option">
            <a href="home.php">Home</a>
            <a href="aboutus.php">About us</a>
            <a href="viewproduct.php">All products</a>
            <a href="filterproduct.php?category=earing">Earings</a>
            <a href="filterproduct.php?category=ring">Rings</a>
            <a href="filterproduct.php?category=necklace">Necklaces</a>
            <a href="filterproduct.php?category=charm">Charms</a>
            <a href="filterproduct.php?category=bracelet">Bracelets</a>
        </div>
        <div class="cta">
            <form class="d-flex" role="search" method="GET" action="search.php">
                <input class="form-control srch" type="search" name="query" placeholder="Search..." required>
                <button class="btn" type="submit"><img src="../Assets/img/loupe.png" alt="Search"></button>
            </form>

            <?php
            if (isset($_SESSION['id'])):
                $user = get_user_id($pdo, $_SESSION['id']); ?>
                <a href="addtocart.php" class="cta_detail">
                    <img src="../Assets/img/bag.png" alt="" class="symbol_cta">
                    <img src="../Assets/img/bag_hover.png" alt="" class="symbol_hover">
                </a>

                <a href="oh.php" class="cta_detail">
                    <img src="../Assets/img/history.png" alt="" class="symbol_cta">
                    <img src="../Assets/img/history_hover.png" alt="" class="symbol_hover">
                </a>

                <a class="cta_detail"><img src="../Assets/profileimg/<?= $user['img_url']; ?>" alt="" class="pfp"></a>
                <a href="logout.php" class="logout">Log Out</a>

            <?php else: ?>

                <a href="signin.php" class="cta_detail">
                    <img src="../Assets/img/user.png" alt="" class="symbol_cta">
                    <img src="../Assets/img/user_hover.png" alt="" class="symbol_hover">
                </a>
                <a href="addtocart.php" class="cta_detail">
                    <img src="../Assets/img/bag.png" alt="" class="symbol_cta">
                    <img src="../Assets/img/bag_hover.png" alt="" class="symbol_hover">
                </a>

            <?php endif; ?>
        </div>

    </div>