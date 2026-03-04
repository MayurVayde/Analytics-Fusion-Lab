CREATE DATABASE IF NOT EXISTS weltec_db;
USE weltec_db;

CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a default admin user. 
-- Username: admin
-- Password: password123 (hashed)
INSERT INTO users (username, password) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

CREATE TABLE IF NOT EXISTS posts (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    content TEXT NOT NULL,
    excerpt VARCHAR(255),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert some dummy posts
INSERT INTO posts (title, slug, content, excerpt, image_url) VALUES 
('How Data Science is Changing the World', 'how-data-science-is-changing-the-world', '<p>Data science is the domain of study that deals with vast volumes of data using modern tools and techniques to find unseen patterns.</p><p>It is fundamentally altering how businesses operate...</p>', 'Learn how data science is impacting industries globally.', 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&w=800&q=80'),
('5 Reasons to Learn Full Stack Web Development', '5-reasons-to-learn-full-stack', '<p>Full stack web development offers incredible career opportunities. Developers who can handle both front-end and back-end are in huge demand.</p>', 'Discover the benefits of becoming a full stack developer in 2024.', 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&w=800&q=80'),
('The Future of Generative AI', 'future-of-generative-ai', '<p>Generative AI is making waves across various sectors. From creating stunning art to writing code, the possibilities are endless.</p>', 'What does the future hold for Generative AI and Machine Learning?', 'https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&w=800&q=80');

