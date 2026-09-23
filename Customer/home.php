<?php require_once "header.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";
$products = get_product($pdo);
?>

<div class="container-fluid intro_page">
    <div class="shopnow">
        <p>Wear the Beauty You Deserve</p>
        <a href="viewproduct.php">Discover more</a>
    </div>
</div>

<div class="display">
    <a href="filterproduct.php?category=earing" class="display_detail">
        <img src="../Assets/img/display_earing.jpg" alt="" class="display-normal">
        <img src="../Assets/img/display_earing_hover.jpg" alt="" class="display-hover">
        <p>Earings</p>
    </a>

    <a href="filterproduct.php?category=ring" class="display_detail">
        <img src="../Assets/img/display_ring.jpg" alt="" class="display-normal">
        <img src="../Assets/img/display_ring_hover.jpg" alt="" class="display-hover">
        <p>Rings</p>
    </a>

    <a href="filterproduct.php?category=necklace" class="display_detail">
        <img src="../Assets/img/display_necklace.jpg" alt="" class="display-normal">
        <img src="../Assets/img/display_necklace_hover.jpg" alt="" class="display-hover">
        <p>Necklaces</p>
    </a>

    <a href="filterproduct.php?category=charm" class="display_detail">
        <img src="../Assets/img/display_charm.jpg" alt="" class="display-normal">
        <img src="../Assets/img/display_charm_hover.jpg" alt="" class="display-hover">
        <p>Charms</p>
    </a>

    <a href="filterproduct.php?category=bracelet" class="display_detail">
        <img src="../Assets/img/display_bracelet.jpg" alt="" class="display-normal">
        <img src="../Assets/img/display_bracelet_hover.jpg" alt="" class="display-hover">
        <p>Bracelets</p>
    </a>
</div>

<div class="gallery">
    <h2 data-aos="fade-down">Why Choose Us</h2>
    <div class="gallery-container">
        <div class="gallery-item" data-aos="flip-left">
            <img src="../Assets/img/caftman.jpg" alt="High-Quality Craftsmanship">
            <p>HIGH-QUALITY CRAFTSMANSHIP</p>
        </div>

        <div class="gallery-item" data-aos="flip-up">
            <img src="../Assets/img/customerservice.jpg" alt="Exceptional Customer Service">
            <p>EXCEPTIONAL CUSTOMER SERVICE</p>
        </div>
        
        <div class="gallery-item" data-aos="flip-right">
            <img src="../Assets/img/option.jpg" alt="Custom Design Options">
            <p>CUSTOM DESIGN OPTIONS</p>
        </div>
    </div>
</div>


<div class="abtusimg">
    <div class="abtus">
        <div class="abtustext">
        At Gemora, we believe that jewelry is more than just an
        accessory—it's a reflection of your story, your style, and your most cherished moments.
        Each piece in our collection is crafted with precision,
        passion, and a commitment to excellence. From dazzling
        gemstones to intricately designed settings, we bring you
        jewelry that embodies elegance, sophistication, and timeless beauty.
        Whether you're celebrating love, marking a milestone,
        or simply indulging in something special, Gemora is here to
        make every moment shine. Let us be part of your journey—one
        exquisite piece at a time.
        </div>
        <a href="aboutus.php">Learn more about us</a>
    </div>
</div>

<?php require_once "footer.php"; ?>

</body>

</html>