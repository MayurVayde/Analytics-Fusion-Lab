<?php
$pageTitle = "Contact Us";
$currentPage = "contact";
include 'includes/header.php';

// Basic Form Handling Logic
$success_msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // In a real scenario, we'd sanitize and use mail() or database
    $name = htmlspecialchars($_POST['name']);
    $success_msg = "Thank you, $name. We have received your message and will contact you shortly.";
}
?>

<!-- Page Header -->
<div class="page-header"
    style="background: linear-gradient(rgba(0, 51, 102, 0.9), rgba(0, 51, 102, 0.9)), url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover; padding: 120px 0 80px; text-align: center; color: white;">
    <div class="container animate-up">
        <h1 style="font-size: 3rem; margin-bottom: 20px;">Contact Us</h1>
        <p style="font-size: 1.1rem; opacity: 0.9;">Have questions? Get in touch with our counselors.</p>
    </div>
</div>

<section class="section-padding">
    <div class="container">
        <div style="display: flex; flex-wrap: wrap; gap: 50px;">
            <!-- Contact Info -->
            <div style="flex: 1; min-width: 300px;" class="animate-up">
                <h3 style="font-size: 2rem; margin-bottom: 30px;">Get In Touch</h3>

                <div style="display: flex; gap: 20px; margin-bottom: 30px;">
                    <div
                        style="width: 50px; height: 50px; background: rgba(0, 51, 102, 0.05); color: var(--primary-color); display: flex; align-items: center; justify-content: center; border-radius: 50%; font-size: 1.5rem; flex-shrink: 0;">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h4 style="font-size: 1.2rem; margin-bottom: 5px;">Vadodara Head Office</h4>
                        <p style="color: var(--text-light);">3rd Floor, Analytics Fusion Lab Center, Near ABC Circle,
                            Vadodara, Gujarat 390001</p>
                    </div>
                </div>

                <div style="display: flex; gap: 20px; margin-bottom: 30px;">
                    <div
                        style="width: 50px; height: 50px; background: rgba(0, 51, 102, 0.05); color: var(--primary-color); display: flex; align-items: center; justify-content: center; border-radius: 50%; font-size: 1.5rem; flex-shrink: 0;">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <h4 style="font-size: 1.2rem; margin-bottom: 5px;">Phone Number</h4>
                        <p style="color: var(--text-light);">+91 99044 12345<br>+91 99044 54321</p>
                    </div>
                </div>

                <div style="display: flex; gap: 20px; margin-bottom: 30px;">
                    <div
                        style="width: 50px; height: 50px; background: rgba(0, 51, 102, 0.05); color: var(--primary-color); display: flex; align-items: center; justify-content: center; border-radius: 50%; font-size: 1.5rem; flex-shrink: 0;">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <h4 style="font-size: 1.2rem; margin-bottom: 5px;">Email Address</h4>
                        <p style="color: var(--text-light);">
                            info@analyticsfusionlab.com<br>careers@analyticsfusionlab.com</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div style="flex: 1.5; min-width: 300px; background: var(--bg-white); padding: 40px; border-radius: var(--border-radius-md); box-shadow: var(--box-shadow);"
                class="animate-up delay-1">
                <h3 style="font-size: 1.8rem; margin-bottom: 25px;">Send Us A Message</h3>

                <?php if ($success_msg != ""): ?>
                    <div
                        style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: var(--border-radius-sm); margin-bottom: 20px;">
                        <?php echo $success_msg; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <label
                                style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">Your
                                Name</label>
                            <input type="text" name="name" required
                                style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: var(--border-radius-sm); font-family: inherit; font-size: 1rem; outline: none; transition: var(--transition);">
                        </div>
                        <div>
                            <label
                                style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">Email
                                Address</label>
                            <input type="email" name="email" required
                                style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: var(--border-radius-sm); font-family: inherit; font-size: 1rem; outline: none; transition: var(--transition);">
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label
                            style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">Phone/Mobile</label>
                        <input type="text" name="phone" required
                            style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: var(--border-radius-sm); font-family: inherit; font-size: 1rem; outline: none; transition: var(--transition);">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label
                            style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">Course
                            Interested In</label>
                        <select name="course"
                            style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: var(--border-radius-sm); font-family: inherit; font-size: 1rem; outline: none; transition: var(--transition);">
                            <option value="">Select Course...</option>
                            <option value="Data Analytics">Data Analytics</option>
                            <option value="Data Science">Data Science</option>
                            <option value="AI/ML">AI/ML</option>
                            <option value="Full Stack">Full Stack Web Development</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <label
                            style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">Your
                            Message</label>
                        <textarea name="message" rows="5" required
                            style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: var(--border-radius-sm); font-family: inherit; font-size: 1rem; outline: none; transition: var(--transition); resize: vertical;"></textarea>
                    </div>

                    <button type="submit" class="btn btn-secondary"
                        style="width: 100%; font-size: 1.1rem; padding: 15px;">Send
                        Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Add Focus Effects via Inline Style for simplicity here -->
<style>
    input:focus,
    textarea:focus,
    select:focus {
        border-color: var(--secondary-color) !important;
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
    }
</style>

<?php include 'includes/footer.php'; ?>