<?php 
include '../includes/header.php'; 
?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f0f2f5;
        margin: 0;
        padding: 0;
    }

    .membership-header {
        background: linear-gradient(to right, #1e1e2f, #333354);
        color: white;
        padding: 60px 20px;
        text-align: center;
        animation: slideDownFade 1s ease-in-out;
    }

    @keyframes slideDownFade {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .membership-header h1 {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .membership-header p {
        font-size: 18px;
        opacity: 0.9;
    }

    .class-info {
        padding: 60px 20px;
        max-width: 1200px;
        margin: auto;
    }

    .class-info h3 {
        text-align: center;
        color: #1e90ff;
        font-size: 32px;
        margin-bottom: 40px;
        animation: fadeInUp 1s ease;
    }

    .class-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .class-card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        padding: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: fadeInCard 0.7s ease-in-out;
    }

    .class-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .class-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 15px;
        transition: transform 0.3s ease;
    }

    .class-card:hover img {
        transform: scale(1.03);
    }

    .class-card h4 {
        font-size: 22px;
        color: #333;
        margin-bottom: 10px;
    }

    .class-card p {
        color: #666;
        font-size: 15px;
    }

    .price {
        font-weight: bold;
        color: #1e90ff;
        margin-top: 10px;
        font-size: 16px;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInCard {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @media (max-width: 768px) {
        .membership-header h1 {
            font-size: 28px;
        }
        .class-info h3 {
            font-size: 24px;
        }
    }
</style>

<div class="membership-header">
    <h1>FitZone Membership Plans & Services</h1>
    <p>Get in shape, stay healthy, and achieve your fitness goals with our tailored classes and memberships!</p>
</div>

<section class="class-info">
    <h3>Our Classes & Services</h3>
    <div class="class-cards">
        <div class="class-card">
            <img src="../IMAGES/cardio.jpg" alt="Cardio & Strength">
            <h4>Cardio & Strength</h4>
            <p>High-intensity workouts to burn fat, boost endurance, and build lean muscle.</p>
            <p class="price">Rs. 2,500 / month</p>
        </div>
        <div class="class-card">
            <img src="../IMAGES/yoga.jpg" alt="Yoga & Group Classes">
            <h4>Yoga & Group Classes</h4>
            <p>Improve flexibility, posture, and mindfulness with expert-led yoga sessions.</p>
            <p class="price">Rs. 2,000 / month</p>
        </div>
        <div class="class-card">
            <img src="../IMAGES/nutrition.jpg" alt="Nutrition Guidance">
            <h4>Nutrition Guidance</h4>
            <p>Personalized nutrition plans and expert diet tips to complement your workouts.</p>
            <p class="price">Rs. 1,500 / month</p>
        </div>
        <div class="class-card">
            <img src="../IMAGES/personal training.jpg" alt="Personal Training">
            <h4>Personal Training</h4>
            <p>One-on-one coaching focused on your unique body type and fitness goals.</p>
            <p class="price">Rs. 4,000 / month</p>
        </div>
        <div class="class-card">
            <img src="../IMAGES/zumba.jpg" alt="Zumba & Dance Fitness">
            <h4>Zumba & Dance Fitness</h4>
            <p>Dance your way to fitness with high-energy Zumba and dance-based routines.</p>
            <p class="price">Rs. 2,200 / month</p>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
