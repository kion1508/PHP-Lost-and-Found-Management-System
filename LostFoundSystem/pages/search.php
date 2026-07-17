<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    header("Location: /project/LostFoundSystem/login.php");
    exit();
}
/**
 * Search Page
 * Search for lost and found items
 */
$css_path = '../assets/css/style.css';
$root_path = '../';
include '../includes/header.php';
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

// $search=mysqli_real_escape_string($conn,$_GET['search']);
// $category=mysqli_real_escape_string($conn,$_GET['category']);
// $report_type=mysqli_real_escape_string($conn,$_GET['report_type']);
?>

<div class="d-flex">
    <?php $pages_path = ''; include '../includes/sidebar_user.php'; ?>

    <!-- Main Content -->
    <div class="main-content flex-grow-1">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title"><i class="fas fa-search text-primary me-2"></i>Search Items</h1>
                <p class="page-subtitle">Find lost or found items reported in the system</p>
            </div>
            <button class="btn btn-outline-secondary d-lg-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Search Section -->
        <div class="search-section fade-in">
            <form action="search.php" method="GET">
                <div class="row">
                    <!-- Main Search Input -->
                    <div class="col-lg-5 mb-3">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="form-control search-input" id="search" name="search"
                                   placeholder="Search by item name, description, or keywords">
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="col-lg-3 mb-3">
                        <select class="form-select form-select-lg" id="category" name="category">
                            <option value="">All Categories</option>
                            <option value="electronics">Electronics</option>
                            <option value="keys">Keys</option>
                            <option value="bags">Bags & Backpacks</option>
                            <option value="cards">Cards & IDs</option>
                            <option value="jewelry">Jewelry</option>
                            <option value="books">Books & Stationery</option>
                            <option value="clothing">Clothing</option>
                            <option value="accessories">Accessories</option>
                            <option value="sports">Sports Equipment</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Report Type Filter -->
                    <div class="col-lg-2 mb-3">
                        <select class="form-select form-select-lg" id="report_type" name="report_type">
                            <option value="">All Types</option>
                           
                        </select>
                    </div>

                    <!-- Search Button -->
                    <div class="col-lg-2 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg w-100" name="submit">
                            <i class="fas fa-search me-2"></i>Search
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Results Count -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Results: <span class="text-muted">8 items found</span></h5>
            <div class="btn-group">
                <button class="btn btn-outline-secondary active" title="Grid View">
                    <i class="fas fa-th-large"></i>
                </button>
                <button class="btn btn-outline-secondary" title="List View">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>

        <!-- Search Results Grid -->
        <div class="row">
            <!-- Item 1 -->
             <?php 
             $query = "(SELECT report_lost_id AS tracking_id, item_name, category, date_lost AS date_reported, 'Lost' AS report_type, status FROM lost_items WHERE reporter_id = '$user_id')
                UNION 
                (SELECT report_found_id AS tracking_id, item_name, category, date_found AS date_reported, 'Found' AS report_type, status FROM found_items WHERE reporter_id = '$user_id')
                ORDER BY date_reported DESC";

                $result = mysqli_query($conn, $query);
             if ($result && mysqli_num_rows($result) > 0) {
                # code...          
                if (isset($_GET['submit'])) {
                    $search=mysqli_real_escape_string($conn,$_GET['search']);
                    $category=mysqli_real_escape_string($conn,$_GET['category']);
                    $report_type=mysqli_real_escape_string($conn,$_GET['report_type']);
                    # code...
                   
                        # code...
                        if ($report_type=='') {
                            # code...
                        
                        $sql = "
                                    SELECT *
                                    FROM
                                    (
                                        SELECT
                                            report_lost_id AS tracking_id,
                                            item_name,
                                            category,
                                            last_loc AS location,
                                            date_lost AS date_reported,
                                            'Lost' AS report_type,
                                            status,
                                            image
                                        FROM lost_items
                                        WHERE reporter_id='$user_id'

                                        UNION

                                        SELECT
                                            report_found_id AS tracking_id,
                                            item_name,
                                            category,
                                            location_found AS location,
                                            date_found AS date_reported,
                                            'Found' AS report_type,
                                            status,
                                            image
                                        FROM found_items
                                        WHERE reporter_id='$user_id'
                                    ) AS reports

                                    WHERE item_name LIKE '%$search%'
                                    AND category='$category'

                                    ORDER BY date_reported DESC";
                                $execute=mysqli_query($conn,$sql);
                            while ($record = mysqli_fetch_assoc($execute)) {
                                
                                $item_desc=$record['item_name'];
                                $item_catg=$record['category'];
                                $item_loc=$record['location'];
                                $date_reported=$record['date_reported'];
                                $type=$record['report_type'];
                                $image=$record['image'];
                                $color_desc="";
                                if ($type=='Lost') {
                                    $color_desc="badge bg-warning item-badge";
                                    # code...
                                }elseif ($type=='Found') {
                                    $color_desc="badge bg-success item-badge";
                                    # code...
                                }
                                if ($type=='Lost') {
                                    $image_loc = "uploads_lost/" . $image;

                                    # code...
                                }elseif ($type=='Found') {
                                    $image_loc = "uploads_found/" . $image;
                                    # code...
                                }
                                $track_id=$record['tracking_id'];
                            //    echo "Search: " . $search . "<br>";
                            //     echo "Category: " . $category . "<br>";
            ?>
             <div class="col-md-6 col-lg-4 mb-4">
                <div class="card item-card hover-scale">
                    <div class="item-image">
                        <img src="<?php echo$image_loc ?>" alt="">
                        <!-- <i class="fas fa-mobile-alt"></i> -->
                    </div>
                    <span class="<?php echo$color_desc ?>"><?php echo$type ?></span>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo$item_desc ?></h5>
                        <p class="card-text">
                            <small>
                                <i class="fas fa-tag me-1"></i><?php echo$item_catg ?><br>
                                <i class="fas fa-map-marker-alt me-1"></i><?php echo$item_loc ?><br>
                                <i class="fas fa-calendar me-1"></i><?php echo$date_reported ?>
                            </small>
                        </p>
                       <a href="item_details.php?id=<?php echo urlencode($track_id); ?>" class="btn btn-outline-primary w-100">
    <i class="fas fa-eye me-1"></i>View Details
</a>
                    </div>
                </div>
            </div>
            <?php 
             }
                        }

                    }
                }
             ?>
             
           

            <!-- Item 2 -->
            
           
            <!-- Item 7 -->
           
            <!-- Item 8 -->
            
        </div>

        <!-- Pagination -->
        <nav aria-label="Search results pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
