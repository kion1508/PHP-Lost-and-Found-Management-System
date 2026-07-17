<?php
session_start();
$locker=1;
include_once('database.php');
/**
 * Home Page - Index
 * Landing page for the Lost & Found System
 */
$css_path = 'assets/css/style.css';
$root_path = '';
include 'includes/header.php';
?>
<body>
<?php include 'includes/navbar.php'; ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="fade-in"><i class="fas fa-box-open me-3"></i>Lost & Found System</h1>
                <p class="lead fade-in">
                    Your campus-wide solution for reporting and recovering lost items.
                    Connect with your community to find what you've lost or help others find what they need.
                </p>
                <div class="mt-4 fade-in">
                    <a href="<?php echo$login_page ?>" class="btn btn-light btn-lg me-2">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </a>
                    <a href="<?php echo$register ?>" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-user-plus me-2"></i>Register
                    </a>
                </div>
                <div class="mt-3 fade-in">
                    <a href="pages/report_lost.php" class="btn btn-warning btn-lg me-2">
                        <i class="fas fa-question-circle me-2"></i>Report Lost Item
                    </a>
                    <a href="pages/report_found.php" class="btn btn-success btn-lg">
                        <i class="fas fa-check-circle me-2"></i>Report Found Item
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3 text-center mb-4 mb-md-0">
                <span class="stat-number">1,250</span>
                <span class="stat-label">Total Reports</span>
            </div>
            <div class="col-6 col-md-3 text-center mb-4 mb-md-0">
                <span class="stat-number">485</span>
                <span class="stat-label">Items Returned</span>
            </div>
            <div class="col-6 col-md-3 text-center">
                <span class="stat-number">320</span>
                <span class="stat-label">Active Reports</span>
            </div>
            <div class="col-6 col-md-3 text-center">
                <span class="stat-number">1,500+</span>
                <span class="stat-label">Happy Users</span>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Use Our System?</h2>
            <p class="text-muted">A simple and efficient way to manage lost and found items on campus.</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card feature-card hover-scale">
                    <div class="feature-icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <h5 class="feature-title">Easy Reporting</h5>
                    <p class="feature-text">
                        Quickly report lost or found items with our simple forms. Add descriptions and images to help identify items.
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card feature-card hover-scale">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h5 class="feature-title">Smart Search</h5>
                    <p class="feature-text">
                        Search through all reports with powerful filters. Find items by category, location, date, or keywords.
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card feature-card hover-scale">
                    <div class="feature-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h5 class="feature-title">Status Updates</h5>
                    <p class="feature-text">
                        Track your reports and get updates when items are found or returned. Stay informed every step of the way.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="how-it-works">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">How It Works</h2>
            <p class="text-muted">Three simple steps to report or recover your items.</p>
        </div>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h5 class="step-title">Create Account</h5>
                    <p class="step-text">Sign up with your university email to get started with the system.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h5 class="step-title">Report Item</h5>
                    <p class="step-text">Submit details about your lost or found item including photos.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h5 class="step-title">Search & Match</h5>
                    <p class="step-text">Browse reports to find matching items or potential matches.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h5 class="step-title">Connect</h5>
                    <p class="step-text">Contact the reporter to arrange item return or claim.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Items Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Recent Reports</h2>
            <p class="text-muted">Latest lost and found items reported in the system.</p>
        </div>
        <div class="row">
            <!-- Item 1 -->
            <div class="col-md-4 mb-4">
                <div class="card item-card hover-scale">
                    <div class="item-image">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <span class="badge bg-warning item-badge">Lost</span>
                    <div class="card-body">
                        <h5 class="card-title">iPhone 14 Pro</h5>
                        <p class="card-text item-meta">
                            <i class="fas fa-map-marker-alt me-1"></i> Library Building<br>
                            <i class="fas fa-calendar me-1"></i> July 3, 2026
                        </p>
                        <a href="pages/item_details.php" class="btn btn-outline-primary w-100">
                            <i class="fas fa-eye me-1"></i> View Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="col-md-4 mb-4">
                <div class="card item-card hover-scale">
                    <div class="item-image">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <span class="badge bg-success item-badge">Found</span>
                    <div class="card-body">
                        <h5 class="card-title">Blue Backpack</h5>
                        <p class="card-text item-meta">
                            <i class="fas fa-map-marker-alt me-1"></i> Science Block<br>
                            <i class="fas fa-calendar me-1"></i> July 2, 2026
                        </p>
                        <a href="pages/item_details.php" class="btn btn-outline-primary w-100">
                            <i class="fas fa-eye me-1"></i> View Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="col-md-4 mb-4">
                <div class="card item-card hover-scale">
                    <div class="item-image">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <span class="badge bg-warning item-badge">Lost</span>
                    <div class="card-body">
                        <h5 class="card-title">Student ID Card</h5>
                        <p class="card-text item-meta">
                            <i class="fas fa-map-marker-alt me-1"></i> Cafeteria<br>
                            <i class="fas fa-calendar me-1"></i> July 1, 2026
                        </p>
                        <a href="pages/item_details.php" class="btn btn-outline-primary w-100">
                            <i class="fas fa-eye me-1"></i> View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="pages/search.php" class="btn btn-primary btn-lg">
                <i class="fas fa-search me-2"></i>View All Reports
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
