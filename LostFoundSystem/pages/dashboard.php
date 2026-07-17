<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: /project/LostFoundSystem/login.php");
    exit();
}

$locker=1;
include_once('C:\xampp\htdocs\project\LostFoundSystem\database.php');

$user_id=$_SESSION['id'];
$query="SELECT * FROM lost_items WHERE reporter_id='$user_id'";
$result=mysqli_query($conn,$query);
$num_lost_item=$result->num_rows;
$sql="SELECT * FROM found_items WHERE reporter_id='$user_id'";
$execute=mysqli_query($conn,$sql);
$num_found_item=$execute->num_rows;
$reporter_id=$_SESSION['id'];

$lookup = "SELECT * FROM users WHERE id = '$reporter_id'";
$process = mysqli_query($conn, $lookup);
$row = mysqli_fetch_assoc($process);
$user_name = $row['full_name'];

$fetcher = "
SELECT status
FROM lost_items
WHERE status = 'returned'
AND reporter_id = '$user_id'

UNION

SELECT status
FROM found_items
WHERE status = 'returned'
AND reporter_id = '$user_id'
";
$count=mysqli_query($conn,$fetcher);
$num_returned=$count->num_rows;





/**
 * User Dashboard Page
 * Main dashboard for logged-in users
 */
$css_path = '../assets/css/style.css';
$root_path = '../';
include '../includes/header.php';
?>
<body>
<?php include '../includes/navbar.php'; ?>

<div class="d-flex">
    <?php $pages_path = ''; include '../includes/sidebar_user.php'; ?>

    <!-- Main Content -->
    <div class="main-content flex-grow-1">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Welcome back, <?php echo$user_name ?>!</p>
            </div>
            <button class="btn btn-outline-secondary d-lg-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <!-- Total Reports -->
            <div class="col-6 col-lg-3 mb-4">
                <div class="card stat-card position-relative overflow-hidden">
                    <div class="card-body">
                        <i class="fas fa-clipboard-list stat-icon"></i>
                        <div class="stat-number"><?php echo$num_lost_item + $num_found_item ?></div>
                        <div class="stat-label">Total Reports</div>
                    </div>
                </div>
            </div>

            <!-- Lost Items -->
            <div class="col-6 col-lg-3 mb-4">
                <div class="card stat-card danger position-relative overflow-hidden">
                    <div class="card-body">
                        <i class="fas fa-question-circle stat-icon" style="color: var(--warning-color);"></i>
                        <div class="stat-number"><?php echo$num_lost_item ?></div>
                        <div class="stat-label">Lost Items</div>
                    </div>
                </div>
            </div>

            <!-- Found Items -->
            <div class="col-6 col-lg-3 mb-4">
                <div class="card stat-card success position-relative overflow-hidden">
                    <div class="card-body">
                        <i class="fas fa-check-circle stat-icon"></i>
                        <div class="stat-number"><?php echo$num_found_item ?></div>
                        <div class="stat-label">Found Items</div>
                    </div>
                </div>
            </div>

            <!-- Returned Items -->
            <div class="col-6 col-lg-3 mb-4">
                <div class="card stat-card warning position-relative overflow-hidden">
                    <div class="card-body">
                        <i class="fas fa-undo stat-icon" style="color: var(--success-color);"></i>
                        <div class="stat-number"><?php echo$num_returned ?></div>
                        <div class="stat-label">Returned Items</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="card hover-scale">
                    <div class="card-body text-center py-4">
                        <i class="fas fa-question-circle text-warning fa-2x mb-3"></i>
                        <h5>Report Lost Item</h5>
                        <p class="text-muted">Have you lost something? Report it here to help others find it for you.</p>
                        <a href="report_lost.php" class="btn btn-warning">
                            <i class="fas fa-plus me-1"></i> Report Lost
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card hover-scale">
                    <div class="card-body text-center py-4">
                        <i class="fas fa-check-circle text-success fa-2x mb-3"></i>
                        <h5>Report Found Item</h5>
                        <p class="text-muted">Found something? Report it here to help the owner reclaim it.</p>
                        <a href="report_found.php" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i> Report Found
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reports Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-history me-2"></i>Recent Reports</span>
                <a href="my_reports.php" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <!-- <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Report ID</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>#LFT-001</strong></td>
                                <td>
                                    <i class="fas fa-mobile-alt text-primary me-2"></i>
                                    iPhone 14 Pro
                                </td>
                                <td>Electronics</td>
                                <td><span class="badge bg-warning">Lost</span></td>
                                <td><span class="badge badge-pending">Pending</span></td>
                                <td>Jul 3, 2026</td>
                                <td>
                                    <a href="item_details.php" class="btn btn-sm btn-outline-primary me-1" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>#FND-002</strong></td>
                                <td>
                                    <i class="fas fa-key text-success me-2"></i>
                                    Car Keys
                                </td>
                                <td>Keys</td>
                                <td><span class="badge bg-success">Found</span></td>
                                <td><span class="badge badge-claimed">Claimed</span></td>
                                <td>Jul 2, 2026</td>
                                <td>
                                    <a href="item_details.php" class="btn btn-sm btn-outline-primary me-1" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>#LFT-003</strong></td>
                                <td>
                                    <i class="fas fa-graduation-cap text-primary me-2"></i>
                                    Blue Backpack
                                </td>
                                <td>Bags</td>
                                <td><span class="badge bg-warning">Lost</span></td>
                                <td><span class="badge badge-returned">Returned</span></td>
                                <td>Jul 1, 2026</td>
                                <td>
                                    <a href="item_details.php" class="btn btn-sm btn-outline-primary me-1" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>#FND-004</strong></td>
                                <td>
                                    <i class="fas fa-glasses text-success me-2"></i>
                                    Ray-Ban Sunglasses
                                </td>
                                <td>Accessories</td>
                                <td><span class="badge bg-success">Found</span></td>
                                <td><span class="badge badge-pending">Pending</span></td>
                                <td>Jun 30, 2026</td>
                                <td>
                                    <a href="item_details.php" class="btn btn-sm btn-outline-primary me-1" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> -->
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
