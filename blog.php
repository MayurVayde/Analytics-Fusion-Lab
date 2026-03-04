<?php
$pageTitle = "Our Blog";
$currentPage = "blog";
include 'includes/header.php';
include 'includes/db_connect.php';

// Fetch posts
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!-- Page Header -->
<div class="page-header"
    style="background: linear-gradient(rgba(0, 51, 102, 0.9), rgba(0, 51, 102, 0.9)), url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover; padding: 120px 0 80px; text-align: center; color: white;">
    <div class="container animate-up">
        <h1 style="font-size: 3rem; margin-bottom: 20px;">Analytics Fusion Lab Blog & News</h1>
        <p style="font-size: 1.1rem; opacity: 0.9;">Insights, updates, and tech trends from our experts.</p>
    </div>
</div>

<section class="section-padding bg-light">
    <div class="container">

        <?php if ($result->num_rows > 0): ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px;">

                <?php $delay = 0;
                while ($post = $result->fetch_assoc()): ?>

                    <!-- Blog Card -->
                    <div class="feature-card animate-up"
                        style="padding: 0; text-align: left; animation-delay: <?php echo $delay; ?>s;">
                        <img src="<?php echo htmlspecialchars($post['image_url']); ?>"
                            alt="<?php echo htmlspecialchars($post['title']); ?>"
                            style="width: 100%; height: 200px; object-fit: cover;">

                        <div style="padding: 25px;">
                            <span
                                style="font-size: 0.8rem; color: var(--secondary-color); font-weight: 600; text-transform: uppercase;">IT
                                Career</span>
                            <h3 style="font-size: 1.3rem; margin: 10px 0 15px;">
                                <a href="post.php?slug=<?php echo $post['slug']; ?>" style="color: var(--primary-color);">
                                    <?php echo htmlspecialchars($post['title']); ?>
                                </a>
                            </h3>
                            <p
                                style="color: var(--text-light); margin-bottom: 20px; font-size: 0.95rem; line-height: 1.5; height: 65px; overflow: hidden;">
                                <?php echo htmlspecialchars($post['excerpt']); ?>
                            </p>

                            <div
                                style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #eee; padding-top: 15px;">
                                <span style="font-size: 0.8rem; color: var(--text-light);"><i class="fa-regular fa-calendar"
                                        style="margin-right: 5px;"></i>
                                    <?php echo date('M d, Y', strtotime($post['created_at'])); ?>
                                </span>
                                <a href="post.php?slug=<?php echo $post['slug']; ?>"
                                    style="color: var(--primary-color); font-weight: 600; font-size: 0.9rem;">Read More <i
                                        class="fa-solid fa-arrow-right" style="margin-left: 5px;"></i></a>
                            </div>
                        </div>
                    </div>

                    <?php $delay += 0.2; endwhile; ?>

            </div>
        <?php else: ?>
            <div
                style="text-align: center; padding: 50px; background: white; border-radius: var(--border-radius-md); box-shadow: var(--box-shadow);">
                <i class="fa-regular fa-folder-open"
                    style="font-size: 3rem; color: var(--text-light); margin-bottom: 15px;"></i>
                <h3 style="color: var(--primary-color);">No posts yet</h3>
                <p style="color: var(--text-light);">Check back later for new updates and articles.</p>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>