<?php 
// include header (go up one level from "pages/" to "fitzone/")
include('../includes/header.php'); 
?>
<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #f4f6ff;
        color: #1e1e2f;
        overflow-x: hidden;
    }

    .hero-section {
        background: linear-gradient(to right, rgba(30,30,47,0.8), rgba(51,51,84,0.6)), 
                    url('../IMAGES/hero-gym.jpg') no-repeat center center/cover;
        height: 90vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        padding: 20px;
        animation: fadeInHero 1.2s ease-out;
    }

    @keyframes fadeInHero {
        from { opacity: 0; transform: scale(1.05); }
        to { opacity: 1; transform: scale(1); }
    }

    .hero-section h1 {
        font-size: 52px;
        margin-bottom: 10px;
        letter-spacing: 1px;
    }

    .hero-section p {
        font-size: 20px;
        margin-bottom: 30px;
    }

    .btn {
        background-color: #6c63ff;
        color: white;
        padding: 12px 28px;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background-color: #5848d6;
        transform: scale(1.05);
    }

    .section-title {
        text-align: center;
        font-size: 36px;
        color: #6c63ff;
        margin: 60px 0 20px;
        animation: fadeInTitle 1s ease-in;
    }

    @keyframes fadeInTitle {
        from { opacity: 0; transform: translateY(-15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .features {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px;
        padding: 40px 30px;
        background: #ffffff;
        animation: fadeInSection 1s ease;
    }

    .feature-card {
        background-color: #fdfbff;
        border-radius: 20px;
        width: 300px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        padding: 30px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: slideUp 1s ease forwards;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .feature-card img {
        width: 100%;
        border-radius: 15px;
        margin-bottom: 15px;
    }

    .feature-card h3 {
        color: #6c63ff;
        font-size: 22px;
        margin-bottom: 10px;
    }

    .feature-card p {
        font-size: 16px;
        color: #444;
    }

    .quote-section {
        background: linear-gradient(90deg, #6c63ff, #a29bfe);
        color: white;
        padding: 50px 20px;
        text-align: center;
        font-size: 20px;
        font-style: italic;
        animation: fadeInQuote 1.2s ease;
    }

    @keyframes fadeInQuote {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes slideUp {
        from { transform: translateY(30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    @keyframes fadeInSection {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @media screen and (max-width: 768px) {
        .hero-section h1 {
            font-size: 36px;
        }

        .features {
            flex-direction: column;
            align-items: center;
        }
    }
</style>

<header class="hero-section">
    <h1>Welcome to FitZone</h1>
    <p>Your journey to fitness starts here</p>
    <a href="register.php" class="btn">Join Now</a>
</header>

<div class="quote-section">
    <p><b>“Push yourself because no one else is going to do it for you.”</b></p>
</div>

<style>
    .quote-section {
        background: url('../IMAGES/ggg.jpg') no-repeat center center/cover;
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 24px;
        text-align: center;
        padding: 20px;
        font-family: Arial, sans-serif;
    }
</style>

<h2 class="section-title">Our Classes</h2>

<section class="features">
    <div class="feature-card">
        <img src="../IMAGES/cardio.jpg" alt="Cardio Equipment">
        <h3>Cardio & Strength</h3>
        <p>State-of-the-art equipment to burn fat and build muscle.</p>
    </div>
    <div class="feature-card">
        <img src="../IMAGES/yoga.jpg" alt="Yoga Class">
        <h3>Yoga & Group Classes</h3>
        <p>Relax and build core strength with certified instructors.</p>
    </div>
    <div class="feature-card">
        <img src="../IMAGES/nutrition.jpg" alt="Nutrition Plan">
        <h3>Nutrition Guidance</h3>
        <p>Custom diet plans from expert nutritionists to match your fitness goals.</p>
    </div>
    <div class="feature-card">
        <img src="../IMAGES/Personal Training.jpg" alt="Personal Training">
        <h3>Personal Training</h3>
        <p>One-on-one coaching sessions to target your individual needs.</p>
    </div>
    <div class="feature-card">
        <img src="../IMAGES/zumba.jpg" alt="Zumba Dance">
        <h3>Zumba & Dance Fitness</h3>
        <p>Fun-filled, high-energy dance workouts to boost stamina and mood.</p>
    </div>
</section>

<?php 
// include footer
include('../includes/footer.php'); 
?>
