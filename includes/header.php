<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Updated Title tags and standard SEO stuff -->
    <title>
        <?php echo isset($pageTitle) ? $pageTitle . ' | Analytics Fusion Lab' : 'Analytics Fusion Lab - Empowering Minds With Right Knowledge'; ?>
    </title>
    <meta name="description"
        content="Empowering Minds With Right Knowledge. AI, ML, Data Science, Gen AI training programs.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Header Section -->
    <header class="main-header" id="header">
        <div class="container nav-container">
            <a href="index.php" class="logo">
                <img src="assets/images/logo.png" alt="Analytics Fusion Lab Logo"
                    style="height: 50px; border-radius: 50%;">
                <span class="logo-text" style="font-size: 1.5rem;">Analytics Fusion Lab</span>
            </a>

            <div class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fa-solid fa-bars"></i>
            </div>

            <nav class="nav-menu" id="navMenu">
                <a href="index.php" class="nav-item <?php echo ($currentPage == 'home') ? 'active' : ''; ?>">Home</a>
                <a href="about.php" class="nav-item <?php echo ($currentPage == 'about') ? 'active' : ''; ?>">About
                    Us</a>
                <a href="courses.php"
                    class="nav-item <?php echo ($currentPage == 'courses') ? 'active' : ''; ?>">Courses</a>
                <a href="blog.php" class="nav-item <?php echo ($currentPage == 'blog') ? 'active' : ''; ?>">Blog</a>
                <a href="contact.php"
                    class="nav-item <?php echo ($currentPage == 'contact') ? 'active' : ''; ?>">Contact</a>
                <a href="#" class="btn btn-secondary">Talk To Counselor</a>
            </nav>
        </div>
    </header>