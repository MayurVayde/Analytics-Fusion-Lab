<?php
$pageTitle = "About Us";
$currentPage = "about";
include 'includes/header.php';
?>

<!-- Page Header -->
<div class="page-header"
    style="background: linear-gradient(rgba(0, 51, 102, 0.9), rgba(0, 51, 102, 0.9)), url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover; padding: 120px 0 80px; text-align: center; color: white;">
    <div class="container animate-up">
        <h1 style="font-size: 3rem; margin-bottom: 20px;">About Analytics Fusion Lab</h1>
        <p style="font-size: 1.1rem; opacity: 0.9;">Empowering minds with the right knowledge in AI & Data Science.</p>
    </div>
</div>

<!-- About Section -->
<section class="section-padding">
    <div class="container">
        <div style="display: flex; flex-wrap: wrap; gap: 50px; align-items: center;">
            <div style="flex: 1; min-width: 300px;" class="animate-up">
                <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    alt="About Weltec" style="border-radius: var(--border-radius-lg); box-shadow: var(--box-shadow);">
            </div>
            <div style="flex: 1; min-width: 300px;" class="animate-up delay-1">
                <h2
                    style="color: var(--secondary-color); font-size: 1.2rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px;">
                    Who We Are</h2>
                <h3 style="font-size: 2.5rem; margin-bottom: 20px; line-height: 1.2;">The Premiere AI & Data Science
                    Training Lab</h3>
                <p style="color: var(--text-light); margin-bottom: 20px; font-size: 1.1rem;">As a premier IT training
                    institute, Analytics Fusion Lab provides comprehensive tech education covering the most advanced
                    aspects of Artificial Intelligence (AI), Machine Learning (ML), Data Science, and Generative AI. Our
                    goal is to empower minds with the right knowledge, bridging the critical gap between academic
                    education and modern tech industry requirements.</p>
                <p style="color: var(--text-light); margin-bottom: 30px; font-size: 1.1rem;">Through rigorous
                    instruction, hands-on labs, and real-world IT projects, we transform students from beginners into
                    leading tech professionals equipped to tackle the computing challenges of tomorrow.</p>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                    <div
                        style="background: var(--bg-light); padding: 20px; border-radius: var(--border-radius-sm); border-left: 4px solid var(--secondary-color);">
                        <h4 style="font-size: 2rem; color: var(--primary-color);">10+</h4>
                        <p style="color: var(--text-light); font-weight: 600;">Years of Excellence</p>
                    </div>
                    <div
                        style="background: var(--bg-light); padding: 20px; border-radius: var(--border-radius-sm); border-left: 4px solid var(--secondary-color);">
                        <h4 style="font-size: 2rem; color: var(--primary-color);">50+</h4>
                        <p style="color: var(--text-light); font-weight: 600;">Expert Mentors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="section-padding bg-light">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
            <div class="feature-card animate-up" style="text-align: left; padding: 50px;">
                <div class="feature-icon"
                    style="width: 60px; height: 60px; background: rgba(212, 175, 55, 0.1); color: var(--secondary-color); font-size: 2rem; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin: 0 0 25px 0; box-shadow: none;">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <h3 class="feature-title" style="font-size: 1.8rem; margin-bottom: 15px; text-align: left;">Our Mission
                </h3>
                <p class="feature-desc" style="font-size: 1.1rem; text-align: left;">To provide high-quality, practical
                    education in
                    AI and Data Science that empowers individuals to build successful careers and contribute effectively
                    to the global technology landscape.</p>
            </div>

            <div class="feature-card animate-up delay-1" style="text-align: left; padding: 50px;">
                <div class="feature-icon"
                    style="width: 60px; height: 60px; background: rgba(0, 51, 102, 0.1); color: var(--primary-color); font-size: 2rem; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin: 0 0 25px 0; box-shadow: none;">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <h3 class="feature-title" style="font-size: 1.8rem; margin-bottom: 15px; text-align: left;">Our Vision
                </h3>
                <p class="feature-desc" style="font-size: 1.1rem; text-align: left;">To be recognized globally as the
                    leading fusion
                    lab for technical excellence, innovation, and career transformation in the advanced computing
                    industry.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>