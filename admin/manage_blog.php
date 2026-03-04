<?php
session_start();
include '../includes/db_connect.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$msg = '';

// Handle Delete
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $conn->query("DELETE FROM posts WHERE id=$id");
    $msg = "Post deleted successfully!";
}

// Handle Add/Edit Form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $excerpt = $conn->real_escape_string($_POST['excerpt']);
    $image_url = $conn->real_escape_string($_POST['image_url']);

    if ($_POST['action'] == 'add') {
        $slug = createSlug($title);
        // Check if slug exists, if so append random number
        $check = $conn->query("SELECT id FROM posts WHERE slug='$slug'");
        if ($check->num_rows > 0)
            $slug .= '-' . rand(100, 999);

        $sql = "INSERT INTO posts (title, slug, content, excerpt, image_url) VALUES ('$title', '$slug', '$content', '$excerpt', '$image_url')";
        if ($conn->query($sql)) {
            $msg = "Post created successfully!";
        } else {
            $msg = "Error: " . $conn->error;
        }
    } elseif ($_POST['action'] == 'edit') {
        $id = (int) $_POST['post_id'];
        $sql = "UPDATE posts SET title='$title', content='$content', excerpt='$excerpt', image_url='$image_url' WHERE id=$id";
        if ($conn->query($sql)) {
            $msg = "Post updated successfully!";
        } else {
            $msg = "Error: " . $conn->error;
        }
    }
}

// Fetch Posts
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");

// Fetch single post for editing
$edit_post = null;
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $edit_post = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blog | Analytics Fusion Lab Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: var(--primary-color);
            color: white;
            padding: 20px 0;
            flex-shrink: 0;
        }

        .main-content {
            flex: 1;
            background: var(--bg-light);
            padding: 30px;
        }

        .sidebar a {
            display: block;
            padding: 15px 20px;
            color: rgba(255, 255, 255, 0.8);
            border-left: 4px solid transparent;
            transition: var(--transition);
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: var(--secondary-color);
        }

        .sidebar a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .admin-card {
            background: white;
            padding: 30px;
            border-radius: var(--border-radius-md);
            box-shadow: var(--box-shadow);
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: inherit;
            font-size: 1rem;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .data-table th {
            background: #f8f9fa;
            font-weight: 600;
        }

        .action-btn {
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.9rem;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-edit {
            background: var(--primary-color);
        }

        .btn-delete {
            background: #dc3545;
        }
    </style>
</head>

<body>

    <div class="admin-layout">
        <div class="sidebar">
            <div style="padding: 0 20px 30px; font-size: 1.5rem; font-weight: bold; font-family: var(--font-heading);">
                Analytics Fusion Lab <span style="color: var(--secondary-color);">Admin</span>
            </div>
            <a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="manage_blog.php" class="active"><i class="fa-solid fa-pen-nib"></i> Manage Blog</a>
            <a href="../index.php" target="_blank"><i class="fa-solid fa-earth-americas"></i> Visit Site</a>
            <a href="dashboard.php?logout=true"
                style="margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1);"><i
                    class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>

        <div class="main-content">
            <h2 style="margin-bottom: 30px;"><?php echo $edit_post ? 'Edit Post' : 'Manage Blog Posts'; ?></h2>

            <?php if ($msg): ?>
                <div
                    style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>

            <!-- Form -->
            <div class="admin-card">
                <h3><?php echo $edit_post ? 'Edit: ' . htmlspecialchars($edit_post['title']) : 'Add New Post'; ?></h3>
                <form method="POST" action="manage_blog.php" style="margin-top: 20px;">
                    <input type="hidden" name="action" value="<?php echo $edit_post ? 'edit' : 'add'; ?>">
                    <?php if ($edit_post): ?>
                        <input type="hidden" name="post_id" value="<?php echo $edit_post['id']; ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Post Title</label>
                        <input type="text" name="title" class="form-control" required
                            value="<?php echo $edit_post ? htmlspecialchars($edit_post['title']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label>Excerpt (Short Description)</label>
                        <input type="text" name="excerpt" class="form-control" required
                            value="<?php echo $edit_post ? htmlspecialchars($edit_post['excerpt']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label>Image URL (Unsplash or direct link)</label>
                        <input type="text" name="image_url" class="form-control" required
                            value="<?php echo $edit_post ? htmlspecialchars($edit_post['image_url']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label>Full Content (HTML allowed)</label>
                        <textarea name="content" class="form-control" rows="10"
                            required><?php echo $edit_post ? htmlspecialchars($edit_post['content']) : ''; ?></textarea>
                    </div>

                    <button type="submit"
                        class="btn btn-secondary"><?php echo $edit_post ? 'Update Post' : 'Publish Post'; ?></button>
                    <?php if ($edit_post): ?>
                        <a href="manage_blog.php" class="btn btn-primary" style="margin-left: 10px;">Cancel Edit</a>
                    <?php endif; ?>
                </form>
            </div>

            <!-- Listing -->
            <?php if (!$edit_post): ?>
                <div class="admin-card">
                    <h3>Existing Posts</h3>
                    <table class="data-table" style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date Published</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0): ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                                        <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                                        <td>
                                            <a href="manage_blog.php?edit=<?php echo $row['id']; ?>"
                                                class="action-btn btn-edit">Edit</a>
                                            <a href="manage_blog.php?delete=<?php echo $row['id']; ?>" class="action-btn btn-delete"
                                                onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                                            <a href="../post.php?slug=<?php echo $row['slug']; ?>" class="action-btn"
                                                style="background:#6c757d;" target="_blank">View</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">No posts found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

        </div>
    </div>

</body>

</html>