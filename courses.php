<?php
$pageTitle = "Courses";
$currentPage = "courses";
include 'includes/header.php';
?>

<!-- Page Header -->
<div class="page-header"
    style="background: linear-gradient(rgba(0, 51, 102, 0.9), rgba(0, 51, 102, 0.9)), url('https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover; padding: 120px 0 80px; text-align: center; color: white;">
    <div class="container animate-up">
        <h1 style="font-size: 3rem; margin-bottom: 20px;">Our Top Courses</h1>
        <p style="font-size: 1.1rem; opacity: 0.9;">Industry-aligned programs for your successful IT career.</p>
    </div>
</div>

<section class="section-padding bg-light">
    <div class="container">
        <!-- Reusing the features grid styles from CSS -->
        <div class="features-grid">

            <!-- Course 1 -->
            <div class="feature-card animate-up">
                <div class="feature-icon">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <h3 class="feature-title">Data Analytics Certification</h3>
                <p class="feature-desc">Learn to analyze complex data sets and extract business value. Our comprehensive
                    Data Analytics training includes hands-on visualization using PowerBI, Tableau, SQL, and Python.</p>
                <div
                    style="margin-top: 15px; border-top: 1px solid #eee; padding-top: 15px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-weight: 600; color: var(--primary-color);">Duration: 3 Months</span>
                    <a href="contact.php" class="btn btn-secondary"
                        style="padding: 8px 15px; font-size: 0.8rem;">Enroll</a>
                </div>
            </div>

            <!-- Course 2 -->
            <div class="feature-card animate-up delay-1">
                <div class="feature-icon">
                    <i class="fa-solid fa-brain"></i>
                </div>
                <h3 class="feature-title">Machine Learning (ML) Course</h3>
                <p class="feature-desc">Dive into advanced unsupervised and supervised learning. Our expert-led Machine
                    Learning course covers predictive modeling, NLP, and neural networks for real-world AI systems.</p>
                <div
                    style="margin-top: 15px; border-top: 1px solid #eee; padding-top: 15px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-weight: 600; color: var(--primary-color);">Duration: 4 Months</span>
                    <a href="contact.php" class="btn btn-secondary"
                        style="padding: 8px 15px; font-size: 0.8rem;">Enroll</a>
                </div>
            </div>

            <!-- Course 3 -->
            <div class="feature-card animate-up delay-2">
                <div class="feature-icon">
                    <i class="fa-solid fa-laptop-code"></i>
                </div>
                <h3 class="feature-title">Full Stack Web Development</h3>
                <p class="feature-desc">Master front-end and back-end web development technologies. Top-rated training
                    including React, Node.js, PHP, and scalable database architectures.</p>
                <div
                    style="margin-top: 15px; border-top: 1px solid #eee; padding-top: 15px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-weight: 600; color: var(--primary-color);">Duration: 6 Months</span>
                    <a href="contact.php" class="btn btn-secondary"
                        style="padding: 8px 15px; font-size: 0.8rem;">Enroll</a>
                </div>
            </div>

            <!-- Course 4 -->
            <div class="feature-card animate-up delay-3">
                <div class="feature-icon">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>
                <h3 class="feature-title">Advanced Digital Marketing</h3>
                <p class="feature-desc">Become an industry-certified expert in Search Engine Optimization (SEO), SEM,
                    Social Media Marketing, and data-driven content strategy to exponentially grow brands online.</p>
                <div
                    style="margin-top: 15px; border-top: 1px solid #eee; padding-top: 15px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-weight: 600; color: var(--primary-color);">Duration: 3 Months</span>
                    <a href="contact.php" class="btn btn-secondary"
                        style="padding: 8px 15px; font-size: 0.8rem;">Enroll</a>
                </div>
            </div>

            <!-- Course 5 -->
            <div class="feature-card animate-up">
                <div class="feature-icon">
                    <i class="fa-brands fa-python"></i>
                </div>
                <h3 class="feature-title">Python Programming</h3>
                <p class="feature-desc">Start your programming journey with Python. Learn core concepts, data
                    structures, and object-oriented programming.</p>
                <div
                    style="margin-top: 15px; border-top: 1px solid #eee; padding-top: 15px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-weight: 600; color: var(--primary-color);">Duration: 2 Months</span>
                    <a href="contact.php" class="btn btn-secondary"
                        style="padding: 8px 15px; font-size: 0.8rem;">Enroll</a>
                </div>
            </div>

            <!-- Course 6 -->
            <div class="feature-card animate-up delay-1">
                <div class="feature-icon">
                    <i class="fa-solid fa-mobile-screen"></i>
                </div>
                <h3 class="feature-title">Mobile App Dev</h3>
                <p class="feature-desc">Build cross-platform mobile applications for iOS and Android using Flutter or
                    React Native frameworks.</p>
                <div
                    style="margin-top: 15px; border-top: 1px solid #eee; padding-top: 15px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-weight: 600; color: var(--primary-color);">Duration: 4 Months</span>
                    <a href="contact.php" class="btn btn-secondary"
                        style="padding: 8px 15px; font-size: 0.8rem;">Enroll</a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>