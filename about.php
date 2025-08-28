<?php 
include 'includes/db.php'; 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us | FitZone Fitness Center</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #fdfcfb, #e2d1c3);
            color: #333;
            animation: fadeInBody 1s ease-in-out;
        }

        @keyframes fadeInBody {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .hero {
            background: linear-gradient(to right, rgba(0,0,0,0.6), rgba(0,0,0,0.4)),
                        url('IMAGES/gym-banner.jpg') no-repeat center center;
            background-size: cover;
            height: 320px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
            animation: zoomIn 1s ease-in-out;
        }

        .hero h1 {
            font-size: 48px;
            margin: 0;
        }

        .hero p {
            font-size: 20px;
            margin: 10px 0;
        }

        .hero a.button {
            margin-top: 15px;
            background-color: rgb(35, 111, 28);
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .hero a.button:hover {
            background-color: #2a8822;
        }

        @keyframes zoomIn {
            from { transform: scale(1.05); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .container {
            max-width: 1000px;
            margin: -60px auto 50px auto;
            padding: 40px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 12px 25px rgba(0,0,0,0.1);
            animation: slideUp 0.8s ease;
        }

        @keyframes slideUp {
            from { transform: translateY(60px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        h2 {
            color: rgb(35, 111, 28);
            font-size: 28px;
            margin-bottom: 15px;
        }

        p, li {
            font-size: 18px;
            line-height: 1.6;
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 10px;
            position: relative;
            padding-left: 25px;
        }

        .section {
            margin-bottom: 50px;
            animation: fadeInSection 1s ease;
        }

        @keyframes fadeInSection {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .team-member {
            background: #fafafa;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-5px);
        }

        .team-member img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
        }

        .team-member h3 {
            margin-top: 15px;
            font-size: 20px;
            color: #333;
        }

        .team-member span {
            font-size: 16px;
            color: #777;
        }

        @media screen and (max-width: 768px) {
            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 16px;
            }

            .container {
                padding: 20px;
                margin: -40px 15px 30px;
            }

            h2 {
                font-size: 22px;
            }

            p, li {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="hero">
    <h1>About Us</h1>
    <p>Empowering Your Fitness Journey with Passion & Precision</p>
    <a href="#team" class="button">Meet the Team</a>
</div>

<div class="container">
    <div class="section">
        <h2>Our Mission</h2>
        <p>At FitZone, we are dedicated to helping you achieve your fitness goals through personalized training programs, expert guidance, and a supportive community. Whether you’re looking to lose weight, gain muscle, or just live a healthier lifestyle — we’ve got you covered.</p>
    </div>

    <div class="section">
        <h2>Why Choose FitZone?</h2>
        <ul>
            <li>State-of-the-art equipment</li>
            <li>Certified and experienced trainers</li>
            <li>Wide variety of classes and fitness programs</li>
            <li>Hygienic and spacious environment</li>
            <li>Flexible membership plans</li>
        </ul>
    </div>

    <div class="section" id="team">
        <h2>Meet Our Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <img src="IMAGES/trainer1.jpg" alt="Trainer 1">
                <h3>Mr. Ravi</h3>
                <span>Senior Fitness Coach</span>
            </div>
            <div class="team-member">
                <img src="IMAGES/trainer2.jpg" alt="Trainer 2">
                <h3>Lee</h3>
                <span>Nutrition Specialist</span>
            </div>
            <div class="team-member">
                <img src="IMAGES/trainer3.jpg" alt="Trainer 3">
                <h3>Ruwan</h3>
                <span>Yoga & Wellness Expert</span>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
