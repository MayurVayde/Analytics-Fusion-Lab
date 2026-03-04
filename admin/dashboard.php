<?php
session_start();
include '../includes/db_connect.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

// Get counts
$post_count = $conn->query("SELECT COUNT(*) as count FROM posts")->fetch_assoc()['count'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Analytics Fusion Lab Admin</title>
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

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: var(--border-radius-md);
            box-shadow: var(--box-shadow);
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: rgba(0, 51, 102, 0.1);
            color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-info h3 {
            font-size: 2rem;
            margin-bottom: 5px;
        }

        .stat-info p {
            color: var(--text-light);
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="admin-layout">
        <div class="sidebar">
            <div
                style="padding: 0 20px 30px; font-size: 1.5rem; font-weight: bold; font-family: var(--font-heading); display: flex; align-items: center; gap: 10px;">
                <img src="../assets/images/logo.png" alt="Logo" style="height: 40px; border-radius: 50%;">
                <div>Analytics Fusion Lab <br><span style="color: var(--secondary-color); font-size: 1rem;">Admin</span>
                </div>
            </div>
            <a href="dashboard.php" class="active"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="manage_blog.php"><i class="fa-solid fa-pen-nib"></i> Manage Blog</a>
            <a href="../index.php" target="_blank"><i class="fa-solid fa-earth-americas"></i> Visit Site</a>
            <a href="dashboard.php?logout=true"
                style="margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1);"><i
                    class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>

        <div class="main-content">
            <h2 style="margin-bottom: 30px;">Welcome,
                <?php echo htmlspecialchars($_SESSION['admin_username']); ?>
            </h2>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-book-open"></i></div>
                    <div class="stat-info">
                        <h3>
                            <?php echo $post_count; ?>
                        </h3>
                        <p>Total Blog Posts</p>
                    </div>
                </div>

                <div class="stat-card" style="cursor: pointer;" onclick="window.location.href='manage_blog.php'">
                    <div class="stat-icon" style="background: rgba(212, 175, 55, 0.1); color: var(--secondary-color);">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="stat-info">
                        <h3 style="font-size: 1.3rem; margin-top: 10px;">Quick Add</h3>
                        <p>Create New Post</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>