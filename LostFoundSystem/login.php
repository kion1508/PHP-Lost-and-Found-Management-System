<?php
$locker=1;
session_start();
include_once('database.php');

if (isset($_SESSION['id'])) {
    // $_SESSION['id'] = $row['id'];

    header("Location: pages/dashboard.php");
    exit();
    
    # code...
}


/**
 * Login Page
 * User authentication page
 */
$css_path = 'assets/css/style.css';
$root_path = '';
include 'includes/header.php';

if (isset($_POST['login'])) {
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);
    // $password=password_hash($password,PASSWORD_DEFAULT);
    if (!empty($email) && !empty($password)) {
        $sql="SELECT * FROM users WHERE email= '$email'";
        $execute=mysqli_query($conn,$sql);
        if ($execute->num_rows ==1) {
            # code...
            $row=mysqli_fetch_assoc($execute);
            if (password_verify($password , $row['password'])) {
                $_SESSION['id']=$row['id'];
                header("location: $dashboard");
                # code...
                }else{
                $errormsg ='email or password is invalid';
                    }
        }else{
        $errormsg ="email doesn't exists";
            }
        # code...
    }else{
        $errormsg ='email or password is invalid';
            }
    # code...
}


?>
<body class="auth-wrapper">
<div class="container">
    <div class="card auth-card fade-in">
        <div class="card-body p-4">
            <!-- Logo -->
            <div class="auth-logo">
                <i class="fas fa-box-open"></i>
                <h2>Lost & Found</h2>
                <p class="text-muted">Sign in to your account</p>
            </div>

            <!-- Login Form -->
            <form action="login.php" method="POST">
                <?php 
                if (isset($errormsg)) {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Error!</strong> A problem occurred while processing your request.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                $errormsg
                </div>
                ";
                    # code...
                }
                 ?>
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="Enter your email" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Enter your password" required>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <a href="#" class="text-primary small">Forgot Password?</a>
                </div>

                <!-- Login Button -->
               <button type="submit" class="btn btn-primary w-100 py-2 mb-3" name="login">
                    <i class="fas fa-sign-in-alt me-2"></i> Login
                </button>

                <!-- Divider -->
                <div class="text-center mb-3">
                    <span class="text-muted">OR</span>
                </div>

                <!-- Register Link -->
                <a href="register.php" class="btn btn-outline-primary w-100 py-2">
                    <i class="fas fa-user-plus me-2"></i>Create New Account
                </a>
            </form>

            <!-- Back to Home -->
            <div class="text-center mt-4">
                <a href="index.php" class="text-muted">
                    <i class="fas fa-arrow-left me-1"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
