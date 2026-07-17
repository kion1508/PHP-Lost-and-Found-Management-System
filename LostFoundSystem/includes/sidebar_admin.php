<?php
/**
 * Admin Sidebar Include File
 * Admin Dashboard Sidebar Navigation
 */

// Get current page for active state detection
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Sidebar Navigation -->
<div class="sidebar-backdrop" id="sidebarBackdrop"></div>
<nav class="sidebar" id="sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <h5><i class="fas fa-user-shield me-2"></i>Admin Panel</h5>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
        <!-- Dashboard -->
        <li>
            <a href="dashboard.php" class="<?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Manage Reports -->
        <li>
            <a href="manage_reports.php" class="<?php echo $current_page == 'manage_reports.php' ? 'active' : ''; ?>">
                <i class="fas fa-clipboard-list"></i>
                <span>Manage Reports</span>
            </a>
        </li>

        <!-- Users -->
        <li>
            <a href="#" class="">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
        </li>

        <!-- Divider -->
        <li class="divider"></li>

        <!-- Pending Reports -->
        <li>
            <a href="#" class="">
                <i class="fas fa-clock"></i>
                <span>Pending Reports</span>
            </a>
        </li>

        <!-- Claimed Items -->
        <li>
            <a href="#" class="">
                <i class="fas fa-hand-holding-heart"></i>
                <span>Claimed Items</span>
            </a>
        </li>

        <!-- Returned Items -->
        <li>
            <a href="#" class="">
                <i class="fas fa-check-double"></i>
                <span>Returned Items</span>
            </a>
        </li>

        <!-- Closed Reports -->
        <li>
            <a href="#" class="">
                <i class="fas fa-archive"></i>
                <span>Closed Reports</span>
            </a>
        </li>

        <!-- Divider -->
        <li class="divider"></li>

        <!-- Logout -->
        <li>
            <a href="../login.php">
                <i class="fas fa-sign-out-alt text-danger"></i>
                <span class="text-danger">Logout</span>
            </a>
        </li>
    </ul>
</nav>
