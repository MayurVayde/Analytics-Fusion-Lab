<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = ""; // Default XAMPP has no password
$dbname = "weltec_db";

// Create connection
$conn = new mysqli($host, $username, $password);

// Check connection initially
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure database exists (in case user hasn't imported the SQL)
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    $conn->select_db($dbname);

    // Create tables if they don't exist
    $createUsers = "CREATE TABLE IF NOT EXISTS users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->query($createUsers);

    // Insert default admin if it doesn't exist (Password: password123)
    $checkAdmin = $conn->query("SELECT * FROM users WHERE username='admin'");
    if ($checkAdmin->num_rows == 0) {
        $hash = password_hash("password123", PASSWORD_DEFAULT);
        $conn->query("INSERT INTO users (username, password) VALUES ('admin', '$hash')");
    }

    $createPosts = "CREATE TABLE IF NOT EXISTS posts (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        slug VARCHAR(255) NOT NULL UNIQUE,
        content TEXT NOT NULL,
        excerpt VARCHAR(255),
        image_url VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->query($createPosts);

} else {
    die("Error creating database: " . $conn->error);
}

// Function to generate slug
function createSlug($string)
{
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    return $slug;
}
?>