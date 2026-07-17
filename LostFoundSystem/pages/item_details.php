<?php
/**
 * Item Details Page
 * View detailed information about a reported item
 */
$css_path = '../assets/css/style.css';
$root_path = '../';
include '../includes/header.php';
?>
<body>
<?php include '../includes/navbar.php'; 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once('C:\xampp\htdocs\project\LostFoundSystem\database.php');
if (isset($_POST['mark'])) {
         $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);

        if (substr($item_id, 0, 3) == 'LFT') {
           $sql = "UPDATE lost_items
                SET status = 'returned'
                WHERE report_lost_id = '$item_id'";
            $execute=mysqli_query($conn,$sql); 
            header('location: my_reports.php');

            }
        if (substr($item_id, 0, 3) == 'FND') {
           $sql = "UPDATE found_items
                SET status = 'returned'
                WHERE report_found_id = '$item_id'";
            $execute=mysqli_query($conn,$sql);
            header('location: my_reports.php');

            }
        # code...
    }
if (isset($_GET['id'])) {
    $item_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "
        SELECT report_lost_id AS tracking_id, email, status, item_name, description, category, last_loc, date_lost AS date_recorded, image, contact_no, 'Lost' AS item_type 
        FROM lost_items 
        WHERE report_lost_id = '$item_id'
        UNION
        SELECT report_found_id AS tracking_id, email, status, item_name, description, category, location_found, date_found AS date_recorded, image, contact_no, 'Found' AS item_type 
        FROM found_items 
        WHERE report_found_id = '$item_id' 
        LIMIT 1
    ";
    
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0){
        $item = mysqli_fetch_assoc($result);
        $title       = $item['item_name'];
        $desc        = $item['description'];
        $cat         = $item['category'];
        $loc         = $item['last_loc'];
        $date        = $item['date_recorded'];
        $image_file  = $item['image'];
        $phone       = $item['contact_no'];
        $type        = $item['item_type'];
        $email        = $item['email'];
        $status     =$item['status'];
         if ($type=='Lost') {
            $image_loc = "uploads_lost/" . $image_file;

            # code...
        }elseif ($type=='Found') {
            $image_loc = "uploads_found/" . $image_file;
            # code...
        }
    } 
    
} else {
    echo "<div class='alert alert-warning m-3'>Error: Direct access denied. No item reference specified.</div>";
    exit;
}

?>



<div class="d-flex">
    <?php $pages_path = ''; include '../includes/sidebar_user.php'; ?>

    <!-- Main Content -->
    <div class="main-content flex-grow-1">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title"><i class="fas fa-box-open text-primary me-2"></i>Item Details</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="my_reports.php">My Reports</a></li>
                        <li class="breadcrumb-item active"><?php echo$item_id ?></li>
                    </ol>
                </nav>
            </div>
            <button class="btn btn-outline-secondary d-lg-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <div class="row">
            <!-- Item Image -->
            <div class="col-lg-5 mb-4">
                <div class="card fade-in">
                    <div class="card-body p-0">
                        <div class="item-detail-image">
                            <img src="<?php echo$image_loc ?>" alt="">
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Card -->
                 <?php if ($status == 'pending') { ?>
                <div class="card fade-in mt-4">
                    <div class="card-header" style="background-color: var(--warning-color); color: white;">
                        <i class="fas fa-exclamation-triangle me-2"></i>Lost Item Alert
                    </div>
                    <div class="card-body text-center">
                        <p class="mb-2">This item has been reported as lost.</p>
                        <p class="mb-0 small text-muted">If you found this item, please contact the owner.</p>
                    </div>
                </div>
                <?php } ?>
            </div>

            <!-- Item Information -->
            <div class="col-lg-7 mb-4">
                <div class="card fade-in">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>
                            <span class="badge bg-warning me-2"><?php echo$type ?></span>
                            <strong><?php echo $item_id ?></strong>
                        </span>
                        <span class="badge badge-pending"><?php echo$status ?></span>
                    </div>
                    <div class="card-body">
                        <h3 class="mb-3"><?php echo$title ?></h3>

                        <hr>

                        <!-- Item Details Grid -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="detail-label">Category</div>
                                <div class="detail-value">
                                    <i class="fas fa-tag text-primary me-2"></i><?php echo$cat ?>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="detail-label">Last Known Location</div>
                                <div class="detail-value">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i><?php echo$loc ?>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="detail-label">Date Reported</div>
                                <div class="detail-value">
                                    <i class="fas fa-calendar text-primary me-2"></i><?php echo$date ?>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="detail-label">Date Lost</div>
                                <div class="detail-value">
                                    <i class="fas fa-calendar-times text-primary me-2"></i><?php echo$date ?>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="detail-label">Description</div>
                                <div class="detail-value">
                                    <?php echo$desc ?>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Contact Information -->
                        <h6 class="mb-3"><i class="fas fa-address-card text-primary me-2"></i>Contact Information</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="detail-label">Contact Number</div>
                                <div class="detail-value">
                                    <i class="fas fa-phone text-success me-2"></i><?php echo$phone ?>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="detail-label">Email Address</div>
                                <div class="detail-value">
                                    <i class="fas fa-envelope text-success me-2"></i>
                                    <?php echo$email ?>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Reporter Information -->
                        <!-- <h6 class="mb-3"><i class="fas fa-user text-primary me-2"></i>Reporter Information</h6>
                        <div class="d-flex align-items-center">
                            <div class="profile-avatar" style="width: 50px; height: 50px; min-width: 50px;">
                                <i class="fas fa-user" style="font-size: 1.25rem;"></i>
                            </div>
                            <div class="ms-3">
                                <strong>John Doe</strong><br>
                                <small class="text-muted">Student - Computer Science</small>
                            </div>
                            <a href="profile.php?user=1" class="btn btn-sm btn-outline-primary ms-auto">View Profile</a>
                        </div> -->
                    </div>

                    <!-- Action Buttons -->
                    <div class="card-footer bg-transparent">
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="#" class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <a href="confirmation_delete.php?id=<?php echo urlencode($item_id); ?>" class="btn btn-outline-danger">
                                <i class="fas fa-trash me-1"></i>Delete
                            </a>
                            <form action="item_details.php?id=<?php echo urlencode($item_id); ?>" method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                                <button type="submit" class="btn btn-outline-success ms-auto" name="mark"    <?php if ($status == 'returned') echo 'disabled'; ?>>
                                    <i class="fas fa-check-circle me-1"></i> Mark as Found
                                </button>
                            </form>
                            
                            <a href="my_reports.php" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Similar Items Section -->
        <div class="card fade-in mt-4">
            <!-- <div class="card-header">
                <i class="fas fa-search me-2"></i>Similar Items Found
            </div> -->
            <!-- <div class="card-body">
                <p class="text-muted">Based on the reported item, here are similar items that have been found:</p>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card item-card h-100">
                            <div class="item-image" style="height: 120px;">
                                <i class="fas fa-mobile-alt" style="font-size: 2rem;"></i>
                            </div>
                            <span class="badge bg-success item-badge">Found</span>
                            <div class="card-body">
                                <h6 class="card-title">iPhone (Black)</h6>
                                <p class="card-text small text-muted">
                                    <i class="fas fa-map-marker-alt me-1"></i>Main Building<br>
                                    <i class="fas fa-calendar me-1"></i>Jul 4, 2026
                                </p>
                                <a href="item_details.php" class="btn btn-sm btn-outline-primary w-100">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card item-card h-100">
                            <div class="item-image" style="height: 120px;">
                                <i class="fas fa-mobile-alt" style="font-size: 2rem;"></i>
                            </div>
                            <span class="badge bg-success item-badge">Found</span>
                            <div class="card-body">
                                <h6 class="card-title">Smartphone with Case</h6>
                                <p class="card-text small text-muted">
                                    <i class="fas fa-map-marker-alt me-1"></i>Cafeteria<br>
                                    <i class="fas fa-calendar me-1"></i>Jul 2, 2026
                                </p>
                                <a href="item_details.php" class="btn btn-sm btn-outline-primary w-100">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card item-card h-100">
                            <div class="item-image" style="height: 120px;">
                                <i class="fas fa-mobile-alt" style="font-size: 2rem;"></i>
                            </div>
                            <span class="badge bg-success item-badge">Found</span>
                            <div class="card-body">
                                <h6 class="card-title">iPhone (Cracked Screen)</h6>
                                <p class="card-text small text-muted">
                                    <i class="fas fa-map-marker-alt me-1"></i>Library<br>
                                    <i class="fas fa-calendar me-1"></i>Jul 3, 2026
                                </p>
                                <a href="item_details.php" class="btn btn-sm btn-outline-warning w-100">Possible Match!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
