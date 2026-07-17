<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/**
 * My Reports Page
 * View all user's reports
 */
$css_path = '../assets/css/style.css';
$root_path = '../';
include '../includes/header.php';
if (!isset($_SESSION['id'])) {
    header("Location: /project/LostFoundSystem/login.php");
    exit();
}
?>

<body>
<?php include '../includes/navbar.php'; 

include_once('C:\xampp\htdocs\project\LostFoundSystem\database.php');
$user_id=$_SESSION['id'];


// 1. Combine both lost and found tables into one unified query
// We add a custom string ('Lost' or 'Found') as 'report_type' to track which table it came from
$query = "(SELECT report_lost_id AS tracking_id, item_name, category, date_lost AS date_reported, 'Lost' AS report_type, status FROM lost_items WHERE reporter_id = '$user_id')
          UNION 
          (SELECT report_found_id AS tracking_id, item_name, category, date_found AS date_reported, 'Found' AS report_type, status FROM found_items WHERE reporter_id = '$user_id')
          ORDER BY date_reported DESC";

$result = mysqli_query($conn, $query);

?>

<div class="d-flex">
    <?php $pages_path = ''; include '../includes/sidebar_user.php'; ?>

    <!-- Main Content -->
    <div class="main-content flex-grow-1">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title"><i class="fas fa-list-alt text-primary me-2"></i>My Reports</h1>
                <p class="page-subtitle">View and manage all your lost and found item reports</p>
            </div>
            <button class="btn btn-outline-secondary d-lg-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Filter Bar -->
        <div class="card mb-4 fade-in">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <select class="form-select" id="filter_type">
                            <option value="">All Types</option>
                            <option value="lost">Lost Items</option>
                            <option value="found">Found Items</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 mb-md-0">
                        <select class="form-select" id="filter_status">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="claimed">Claimed</option>
                            <option value="returned">Returned</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <input type="text" class="form-control" id="filter_search" placeholder="Search reports...">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reports Table -->
        <div class="card fade-in">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-history me-2"></i>All Reports (12)</span>
                <div>
                    <a href="report_lost.php" class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-plus me-1"></i>Report Lost
                    </a>
                    <a href="report_found.php" class="btn btn-success btn-sm">
                        <i class="fas fa-plus me-1"></i>Report Found
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
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
                            
                            <?php 
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $tracking_id = $row['tracking_id'];
                                    $item_name = $row['item_name'];
                                    $category = $row['category'];
                                    $type = $row['report_type'];
                                    $status = $row['status'];
                                    $date_formatted = date("M j, Y", strtotime($row['date_reported']));

                                    # code...
                             
                            ?>
                            <tr>
                                <td><strong> <?php echo $tracking_id; ?></strong></td>
                                <td>
                                    <i class="fas fa-mobile-alt text-primary me-2"></i>
                                    <?php echo htmlspecialchars($item_name); ?>
                                </td>
                                <td><?php echo htmlspecialchars($category); ?></td>
                                <td><span class="badge bg-warning"><?php echo$type ?></span></td>
                                <td><span class="badge badge-pending"><?php echo$status ?></span></td>
                                <td><?php echo$date_formatted ?></td>
                                <td>
                                    <a href="item_details.php" class="btn btn-sm btn-outline-primary me-1" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="confirmation_delete.php?id=<?php echo urlencode($tracking_id); ?>" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php 
                               } 
                               }
                            ?>
                           
                            
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Pagination -->
            <div class="card-footer bg-transparent">
                <nav aria-label="Reports pagination">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
