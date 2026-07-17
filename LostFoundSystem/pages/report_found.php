<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    header("Location: /project/LostFoundSystem/login.php");
    exit();
}
/**
 * Report Found Item Page
 * Form for reporting found items
 */
$css_path = '../assets/css/style.css';
$root_path = '../';
include '../includes/header.php';
?>
<body>
<?php include '../includes/navbar.php'; 
$locker=1;

include_once('C:\xampp\htdocs\project\LostFoundSystem\database.php');

$reporter_id=$_SESSION['id'];

$lookup = "SELECT * FROM users WHERE id = '$reporter_id'";
$process = mysqli_query($conn, $lookup);
$row = mysqli_fetch_assoc($process);
$user_email = $row['email'];
$user_phone=$row['phone_no'];
if (isset($_POST['submit'])) {
    $item_name=mysqli_real_escape_string($conn, $_POST['item_name']);
    $description=mysqli_real_escape_string($conn, $_POST['description']);
    $category=mysqli_real_escape_string($conn, $_POST['category']);
    $location=mysqli_real_escape_string($conn, $_POST['location']);
    $date_found=mysqli_real_escape_string($conn, $_POST['date_found']);
    // $contact_no=mysqli_real_escape_string($conn, $_POST['contact_number']);
    // $email=mysqli_real_escape_string($conn, $_POST['email']);
    $image_name=$_FILES['image']['name'];
    $tmp=explode(".", $image_name);
    $newfilename=round(microtime(true)).'.'.end($tmp);
    $uploadpath="uploads_found/".$newfilename;
    move_uploaded_file($_FILES['image']['tmp_name'],$uploadpath);
    $reporter_id=$_SESSION['id'];
   
   
    while (true) {
        # code...
        $prefix = "FND";
        $random_number = mt_rand(10000, 99999);
        $generated_code = $prefix . $random_number;
        $check = mysqli_query($conn, "SELECT id FROM found_items WHERE report_found_id = '$generated_code' LIMIT 1");
        if (mysqli_num_rows($check) == 0) {
        // Stop the loop completely because we found a good code!
        break; 
        }
   
    }



   
    $sql="INSERT INTO found_items (report_found_id,description,item_name,contact_no,location_found,email,category,date_found,image,reporter_id) VALUES ('$generated_code','$description' ,'$item_name' ,'$user_phone' ,'$location','$user_email','$category','$date_found','$newfilename','$reporter_id')";
    $execute=mysqli_query($conn,$sql);
    if ($execute) {
        echo "<div class='alert alert-success m-3'>Report submitted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger m-3'>Database Error: " . mysqli_error($conn) . "</div>";
    }
}

    

?>

<div class="d-flex">
    <?php $pages_path = ''; include '../includes/sidebar_user.php'; ?>

    <!-- Main Content -->
    <div class="main-content flex-grow-1">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title"><i class="fas fa-check-circle text-success me-2"></i>Report Found Item</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Report Found Item</li>
                    </ol>
                </nav>
            </div>
            <button class="btn btn-outline-secondary d-lg-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Report Form -->
        <div class="card fade-in">
            <div class="card-header">
                <i class="fas fa-edit me-2"></i>Found Item Details
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <!-- Item Name -->
                            <div class="mb-3">
                                <label for="item_name" class="form-label">Item Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="item_name" name="item_name"
                                       placeholder="e.g., iPhone 14 Pro, Blue Backpack" required>
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="">-- Select Category --</option>
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

                            <!-- Location -->
                            <div class="mb-3">
                                <label for="location" class="form-label">Location Found <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="location" name="location"
                                       placeholder="e.g., Library Building, 2nd Floor" required>
                            </div>

                            <!-- Date Found -->
                            <div class="mb-3">
                                <label for="date_found" class="form-label">Date Found <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_found" name="date_found" required>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                          placeholder="Provide detailed description (color, size, brand, distinguishing features)" required></textarea>
                            </div>

                            <!-- Contact Number -->
                            <div class="mb-3">
                                <label for="contact_number" class="form-label">Contact Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="contact_number" name="contact_number"
                                       placeholder="<?php echo$user_phone ?>" required disabled>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="<?php echo$user_email ?>" required disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Upload Image (Optional)</label>
                            <div class="file-upload" onclick="document.getElementById('image').click()">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p class="mb-1">Click to upload or drag and drop</p>
                                <p class="small text-muted">PNG, JPG, GIF up to 5MB</p>
                                <input type="file" id="image" name="image" accept="image/*" class="d-none">
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="row mt-4">
                        <div class="col-12 d-flex gap-2">
                            <button type="submit" class="btn btn-success" name="submit">
                                <i class="fas fa-paper-plane me-2"></i>Submit Report
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="fas fa-undo me-2"></i>Reset Form
                            </button>
                            <a href="dashboard.php" class="btn btn-outline-secondary ms-auto">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
