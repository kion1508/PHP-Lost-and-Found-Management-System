<?php
/**
 * Sidebar Include File
 * User Dashboard Sidebar Navigation
 */

// Get current page for active state detection
$current_page = basename($_SERVER['PHP_SELF']);

// Determine if we're in admin or pages directory
$is_admin = strpos($_SERVER['PHP_SELF'], '/admin/') !== false;
$pages_path = $is_admin ? '../pages/' : '';
?>

<!-- Sidebar Navigation -->
<div class="sidebar-backdrop" id="sidebarBackdrop"></div>
<nav class="sidebar" id="sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <h5><i class="fas fa-user-circle me-2"></i>User Menu</h5>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
        <!-- Dashboard -->
        <li>
            <a href="<?php echo $pages_path; ?>dashboard.php" class="<?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Report Lost Item -->
        <li>
            <a href="<?php echo $pages_path; ?>report_lost.php" class="<?php echo $current_page == 'report_lost.php' ? 'active' : ''; ?>">
                <i class="fas fa-question-circle"></i>
                <span>Report Lost Item</span>
            </a>
        </li>

        <!-- Report Found Item -->
        <li>
            <a href="<?php echo $pages_path; ?>report_found.php" class="<?php echo $current_page == 'report_found.php' ? 'active' : ''; ?>">
                <i class="fas fa-check-circle"></i>
                <span>Report Found Item</span>
            </a>
        </li>

        <!-- Search Items -->
        <li>
            <a href="<?php echo $pages_path; ?>search.php" class="<?php echo $current_page == 'search.php' ? 'active' : ''; ?>">
                <i class="fas fa-search"></i>
                <span>Search Items</span>
            </a>
        </li>

        <!-- My Reports -->
        <li>
            <a href="<?php echo $pages_path; ?>my_reports.php" class="<?php echo $current_page == 'my_reports.php' ? 'active' : ''; ?>">
                <i class="fas fa-list-alt"></i>
                <span>My Reports</span>
            </a>
        </li>

        <!-- Divider -->
        <li class="divider"></li>

        <!-- Profile -->
        <!-- <li>
            <a href="<?php echo $pages_path; ?>profile.php" class="<?php echo $current_page == 'profile.php' ? 'active' : ''; ?>">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
        </li> -->

        <!-- Divider -->
        <li class="divider"></li>

        <!-- Logout -->
        <li>
            <a href="<?php echo $pages_path ? '../' : ''; ?>login.php">
                <i class="fas fa-sign-out-alt text-danger"></i>
                <span class="text-danger">Logout</span>
            </a>
        </li>
    </ul>
</nav>
