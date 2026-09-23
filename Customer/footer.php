<?php require_once "header.php"; ?>

<div class="footmain">
    <div class="footer-container">
        <div class="footer_social">
            <h4>Follow us on</h4>
            <p><img src="../Assets/img/facebook.png" alt=""><span>Gemora Gold & Jewelry</span></p>
            <p><img src="../Assets/img/instagram.png" alt=""><span>Gemora_Gold_and_Jewelry</span></p>
            <p><img src="../Assets/img/twitter.png" alt=""><span>Gemora_Gold&Jewelry</span></p>
        </div>
        <div class="footer_help">
            <h4>Help</h4>
            <p>FAQs</p>
            <p>Feedback</p>
            <p>Contact us</p>
            <p>Gift card</p>
            <p>Help code</p>
        </div>
        <div class="footer_help">
            <h4>About Gemora</h4>
            <p>Our Mission & Vision</p>
            <p>Commitments</p>
            <p>Careers</p>
            <p>Sustainability</p>
        </div>
        <div class="footer_contact">
            <h4>Contact us</h4>
            <p><img src="../Assets/img/telegram.png" alt=""><span>Gemora_Gold&Jewelry</span></p>
            <p><img src="../Assets/img/old-typical-phone.png" alt=""><span>+95 912 345 678</span></p>
            <p><img src="../Assets/img/web.png" alt=""><span>www.gemora.com</span></p>
        </div>
        <div class="footer_help">
            <h4>Location</h4>
            <p>Myanmar, Yangon</p>
            <p>No(34), 2nd floor, Taw Win Center</p>
            <p>Open hour (9am - 6pm)</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> Gemora. All Rights Reserved.</p>
    </div>
</div>

<!-- JavaScript Section -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("Footer loaded successfully!");

        // Mobile nav toggle
        const navToggle = document.querySelector(".navToggle");
        const navOptions = document.querySelector(".option");
        if (navToggle && navOptions) {
            navToggle.addEventListener("click", function () {
                const isOpen = navOptions.classList.toggle("active");
                navToggle.classList.toggle("active", isOpen);
                navToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
            });
            // Close the menu after tapping a link
            navOptions.querySelectorAll("a").forEach(link => {
                link.addEventListener("click", () => {
                    navOptions.classList.remove("active");
                    navToggle.classList.remove("active");
                    navToggle.setAttribute("aria-expanded", "false");
                });
            });
        }

        // Example: Change link color on hover
        let footerLinks = document.querySelectorAll(".footmain a");
        footerLinks.forEach(link => {
            link.addEventListener("mouseover", function () {
                this.style.color = "#e0ac1c";
            });
            link.addEventListener("mouseout", function () {
                this.style.color = "";
            });
        });
    });
</script>

</body>
</html>
