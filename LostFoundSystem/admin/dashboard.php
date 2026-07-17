<?php
/**
 * Admin Dashboard Page
 * Main dashboard for administrators
 */
$css_path = '../assets/css/style.css';
$root_path = '../';
include '../includes/header.php';
?>
<body>
<?php include '../includes/navbar.php'; ?>

<div class="d-flex">
    <?php include '../includes/sidebar_admin.php'; ?>

    <!-- Main Content -->
    <div class="main-content flex-grow-1">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title"><i class="fas fa-tachometer-alt text-primary me-2"></i>Admin Dashboard</h1>
                <p class="page-subtitle">System overview and management panel</p>
            </div>
            <button class="btn btn-outline-secondary d-lg-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <!-- Total Reports -->
            <div class="col-6 col-lg-3 mb-4">
                <div class="card stat-card position-relative overflow-hidden hover-scale">
                    <div class="card-body">
                        <i class="fas fa-clipboard-list stat-icon"></i>
                        <div class="stat-number">1,250</div>
                        <div class="stat-label">Total Reports</div>
                    </div>
                </div>
            </div>

            <!-- Pending Reports -->
            <div class="col-6 col-lg-3 mb-4">
                <div class="card stat-card warning position-relative overflow-hidden hover-scale">
                    <div class="card-body">
                        <i class="fas fa-clock stat-icon" style="color: var(--warning-color);"></i>
                        <div class="stat-number">85</div>
                        <div class="stat-label">Pending Reports</div>
                    </div>
                </div>
            </div>

            <!-- Returned Items -->
            <div class="col-6 col-lg-3 mb-4">
                <div class="card stat-card success position-relative overflow-hidden hover-scale">
                    <div class="card-body">
                        <i class="fas fa-check-double stat-icon"></i>
                        <div class="stat-number">485</div>
                        <div class="stat-label">Returned Items</div>
                    </div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="col-6 col-lg-3 mb-4">
                <div class="card stat-card position-relative overflow-hidden hover-scale">
                    <div class="card-body">
                        <i class="fas fa-users stat-icon" style="color: var(--primary-color);"></i>
                        <div class="stat-number">1,520</div>
                        <div class="stat-label">Total Users</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats Row -->
        <div class="row mb-4">
            <div class="col-md-3 col-6 mb-3">
                <div class="card bg-primary-light">
                    <div class="card-body text-center py-3">
                        <h4 class="text-primary mb-0">542</h4>
                        <small class="text-muted">Lost Items</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="card bg-success-light">
                    <div class="card-body text-center py-3">
                        <h4 class="text-success mb-0">708</h4>
                        <small class="text-muted">Found Items</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="card bg-warning-light">
                    <div class="card-body text-center py-3">
                        <h4 class="text-warning mb-0">125</h4>
                        <small class="text-muted">Claimed</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="card" style="background-color: rgba(107, 114, 128, 0.1);">
                    <div class="card-body text-center py-3">
                        <h4 class="text-muted mb-0">185</h4>
                        <small class="text-muted">Closed</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Row -->
        <div class="row">
            <!-- Recent Reports -->
            <div class="col-lg-8 mb-4">
                <div class="card fade-in">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-history me-2"></i>Recent Reports</span>
                        <a href="manage_reports.php" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Item</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>#LFT-301</strong></td>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name=John+Doe&size=30&rounded=true&background=2563EB&color=ffffff" alt="avatar" class="me-2">
                                            John Doe
                                        </td>
                                        <td>iPhone 14 Pro</td>
                                        <td><span class="badge bg-warning">Lost</span></td>
                                        <td><span class="badge badge-pending">Pending</span></td>
                                        <td>Jul 3, 2026</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>#FND-302</strong></td>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name=Jane+Smith&size=30&rounded=true&background=10B981&color=ffffff" alt="avatar" class="me-2">
                                            Jane Smith
                                        </td>
                                        <td>Car Keys</td>
                                        <td><span class="badge bg-success">Found</span></td>
                                        <td><span class="badge badge-claimed">Claimed</span></td>
                                        <td>Jul 2, 2026</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>#LFT-303</strong></td>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name=Mike+Brown&size=30&rounded=true&background=F59E0B&color=ffffff" alt="avatar" class="me-2">
                                            Mike Brown
                                        </td>
                                        <td>Blue Backpack</td>
                                        <td><span class="badge bg-warning">Lost</span></td>
                                        <td><span class="badge badge-returned">Returned</span></td>
                                        <td>Jul 1, 2026</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>#FND-304</strong></td>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name=Sarah+Wilson&size=30&rounded=true&background=2563EB&color=ffffff" alt="avatar" class="me-2">
                                            Sarah Wilson
                                        </td>
                                        <td>Sunglasses</td>
                                        <td><span class="badge bg-success">Found</span></td>
                                        <td><span class="badge badge-pending">Pending</span></td>
                                        <td>Jun 30, 2026</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>#LFT-305</strong></td>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name=Tom+Davis&size=30&rounded=true&background=10B981&color=ffffff" alt="avatar" class="me-2">
                                            Tom Davis
                                        </td>
                                        <td>Student ID Card</td>
                                        <td><span class="badge bg-warning">Lost</span></td>
                                        <td><span class="badge badge-closed">Closed</span></td>
                                        <td>Jun 28, 2026</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widgets -->
            <div class="col-lg-4 mb-4">
                <!-- Quick Actions -->
                <div class="card mb-4 fade-in">
                    <div class="card-header">
                        <i class="fas fa-bolt me-2"></i>Quick Actions
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="../pages/report_lost.php" class="btn btn-warning">
                                <i class="fas fa-plus-circle me-2"></i>Add Lost Item
                            </a>
                            <a href="../pages/report_found.php" class="btn btn-success">
                                <i class="fas fa-plus-circle me-2"></i>Add Found Item
                            </a>
                            <a href="manage_reports.php" class="btn btn-outline-primary">
                                <i class="fas fa-clipboard-list me-2"></i>Manage Reports
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Activity Log -->
                <div class="card fade-in">
                    <div class="card-header">
                        <i class="fas fa-chart-line me-2"></i>Activity Log
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-plus-circle text-warning me-3"></i>
                                    <div>
                                        <small class="text-muted">New report submitted</small>
                                        <p class="mb-0"><strong>John Doe - Lost iPhone</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-plus text-primary me-3"></i>
                                    <div>
                                        <small class="text-muted">New user registered</small>
                                        <p class="mb-0"><strong>New Student Account</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle text-success me-3"></i>
                                    <div>
                                        <small class="text-muted">Item returned</small>
                                        <p class="mb-0"><strong>Backpack #LFT-298</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-edit text-info me-3"></i>
                                    <div>
                                        <small class="text-muted">Report updated</small>
                                        <p class="mb-0"><strong>Status: Claimed</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
