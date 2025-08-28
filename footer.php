<footer class="footer">
    <div class="footer-container">
        <div class="footer-about">
            <h3>About FitZone</h3>
            <p>FitZone Fitness Center is dedicated to helping you achieve your fitness goals with world-class trainers, modern equipment, and a vibrant community.</p>
        </div>

        <div class="footer-contact">
            <h3>Contact Us</h3>
            <p><strong>Address:</strong> 123 Fitness Ave, Kurnegala, Sri Lanka</p>
            <p><strong>Phone:</strong> +94 77 123 4567</p>
            <p><strong>Email:</strong> info@fitzone.lk</p>
        </div>

        <div class="footer-social">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#" target="_blank" title="Facebook"><img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook"></a>
                <a href="#" target="_blank" title="Instagram"><img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram"></a>
                <a href="#" target="_blank" title="Twitter"><img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg" alt="Twitter"></a>
                <a href="#" target="_blank" title="YouTube"><img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/youtube.svg" alt="YouTube"></a>
            </div>
        </div>

        <div class="footer-links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="/fitzone/index.php">Home</a></li>
                <li><a href="/fitzone/pages/about.php">About</a></li>
                <li><a href="/fitzone/pages/register.php">Join</a></li>
                <li><a href="/fitzone/pages/login.php">Login</a></li>
                <li><a href="/fitzone/pages/query.php">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> FitZone Fitness Center. All rights reserved.</p>
    </div>
</footer>

<style>
    .footer {
        background-color: #1e1e2f;
        color: #fff;
        padding: 50px 20px 20px;
        margin-top: 60px;
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1200px;
        margin: auto;
    }

    .footer-container > div {
        flex: 1 1 250px;
        margin: 20px;
    }

    .footer h3 {
        margin-bottom: 15px;
        color: #f39c12; /* Updated orange color */
        font-size: 20px;
    }

    .footer p,
    .footer li,
    .footer a {
        font-size: 14px;
        color: #ccc;
        text-decoration: none;
        line-height: 1.7;
    }

    .footer a:hover {
        color: #f39c12; /* Updated hover color */
    }

    .footer-social .social-icons {
        display: flex;
        gap: 15px;
        margin-top: 10px;
    }

    .social-icons img {
        width: 24px;
        height: 24px;
        filter: brightness(0) invert(1);
        transition: transform 0.3s ease;
    }

    .social-icons a:hover img {
        transform: scale(1.2);
        filter: brightness(0) invert(1) sepia(1) saturate(10) hue-rotate(20deg);
    }

    .footer-links ul {
        list-style: none;
        padding: 0;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 30px;
        font-size: 13px;
        color: #888;
        border-top: 1px solid #444;
        padding-top: 15px;
    }

    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            align-items: center;
        }

        .footer-container > div {
            margin: 20px 0;
        }
    }
</style>
