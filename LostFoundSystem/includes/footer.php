<?php
/**
 * Footer Include File
 * Main footer for the Lost & Found System
 */

// Determine paths based on current directory
$is_admin = strpos($_SERVER['PHP_SELF'], '/admin/') !== false;
$is_pages = strpos($_SERVER['PHP_SELF'], '/pages/') !== false;
$root_path = ($is_admin || $is_pages) ? '../' : '';
?>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5><i class="fas fa-box-open me-2"></i>Lost & Found</h5>
                <p class="text-muted">
                    A university-wide lost and found management system designed to help students and staff recover lost items quickly and efficiently.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5>Quick Links</h5>
                <a href="<?php echo $root_path; ?>index.php">Home</a>
                <a href="<?php echo $root_path; ?>pages/search.php">Search Items</a>
                <a href="<?php echo $root_path; ?>pages/report_lost.php">Report Lost</a>
                <a href="<?php echo $root_path; ?>pages/report_found.php">Report Found</a>
            </div>

            <!-- User Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5>Account</h5>
                <a href="<?php echo $root_path; ?>pages/dashboard.php">Dashboard</a>
                <a href="<?php echo $root_path; ?>pages/my_reports.php">My Reports</a>
                <a href="<?php echo $root_path; ?>pages/profile.php">Profile</a>
                <a href="<?php echo $root_path; ?>login.php">Login</a>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5>Contact Us</h5>
                <p class="mb-1">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    Ladoke Akintola University of Technology
                </p>
                <p class="mb-1">
                    <i class="fas fa-phone me-2"></i>
                    +234 808 4025 428
                </p>
                <p class="mb-1">
                    <i class="fas fa-envelope me-2"></i>
                    Lautech.edu.ng
                </p>
                <div class="mt-3">
                    <a href="#" class="me-2"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="me-2"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="me-2"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#"><i class="fab fa-linkedin fa-lg"></i></a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom text-center">
            <p class="mb-0">
                &copy; <?php echo date('Y'); ?> Lost & Found System. All rights reserved.
                | <a href="#">Privacy Policy</a>
                | <a href="#">Terms of Service</a>
            </p>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Sidebar Toggle Script -->
<script>
    // Mobile Sidebar Toggle
    const sidebar = document.getElementById('sidebar');
    const sidebarBackdrop = document.getElementById('sidebarBackdrop');
    const sidebarToggle = document.getElementById('sidebarToggle');

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
            sidebarBackdrop.classList.toggle('show');
        });
    }

    if (sidebarBackdrop) {
        sidebarBackdrop.addEventListener('click', function() {
            sidebar.classList.remove('show');
            sidebarBackdrop.classList.remove('show');
        });
    }
</script>
</body>
</html>
