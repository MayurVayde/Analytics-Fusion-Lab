<?php
include 'includes/db_connect.php';

if (!isset($_GET['slug'])) {
    header("Location: blog.php");
    exit;
}

$slug = $conn->real_escape_string($_GET['slug']);
$sql = "SELECT * FROM posts WHERE slug='$slug'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: blog.php");
    exit;
}

$post = $result->fetch_assoc();

$pageTitle = htmlspecialchars($post['title']);
$currentPage = "blog";
include 'includes/header.php';
?>

<!-- Post Header -->
<div class="page-header"
    style="background: linear-gradient(rgba(0, 51, 102, 0.9), rgba(0, 51, 102, 0.9)), url('<?php echo htmlspecialchars($post['image_url']); ?>') center/cover; padding: 120px 0 80px; text-align: center; color: white;">
    <div class="container animate-up">
        <span
            style="display: inline-block; background: var(--secondary-color); padding: 5px 15px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; margin-bottom: 20px;">Category:
            IT Training</span>
        <h1
            style="font-size: 3rem; margin-bottom: 20px; max-width: 800px; margin-left: auto; margin-right: auto; line-height: 1.2;">
            <?php echo htmlspecialchars($post['title']); ?>
        </h1>
        <div style="font-size: 1rem; opacity: 0.9;">
            <i class="fa-regular fa-calendar" style="margin-right: 5px;"></i>
            <?php echo date('F d, Y', strtotime($post['created_at'])); ?>
            <span style="margin: 0 10px;">|</span>
            <i class="fa-regular fa-user" style="margin-right: 5px;"></i> By Analytics Fusion Lab Admin
        </div>
    </div>
</div>

<section class="section-padding">
    <div class="container">

        <div style="max-width: 800px; margin: 0 auto;">

            <a href="blog.php"
                style="display: inline-block; color: var(--primary-color); font-weight: 600; margin-bottom: 30px;"><i
                    class="fa-solid fa-arrow-left" style="margin-right: 5px;"></i> Back to Blog</a>

            <div class="post-content animate-up delay-1"
                style="font-size: 1.1rem; line-height: 1.8; color: var(--text-dark);">
                <!-- Outputting raw HTML content because it's a WYSIWYG type content from DB -->
                <?php echo $post['content']; ?>
            </div>

            <div style="margin-top: 50px; padding-top: 30px; border-top: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;"
                class="animate-up delay-2">
                <div>
                    <strong>Share this post:</strong>
                    <div style="display: flex; gap: 10px; margin-top: 10px;">
                        <a href="#"
                            style="width: 35px; height: 35px; background: #3b5998; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%;"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"
                            style="width: 35px; height: 35px; background: #1da1f2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%;"><i
                                class="fa-brands fa-twitter"></i></a>
                        <a href="#"
                            style="width: 35px; height: 35px; background: #0077b5; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%;"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Additional Scoped Styling for Post Content (in case users type lists or headings) -->
<style>
    .post-content h2,
    .post-content h3 {
        color: var(--primary-color);
        margin: 30px 0 15px;
    }

    .post-content p {
        margin-bottom: 20px;
    }

    .post-content ul,
    .post-content ol {
        margin-bottom: 20px;
        padding-left: 20px;
    }

    .post-content li {
        margin-bottom: 10px;
    }

    .post-content img {
        border-radius: var(--border-radius-md);
        margin: 20px 0;
    }
</style>

<?php include 'includes/footer.php'; ?>