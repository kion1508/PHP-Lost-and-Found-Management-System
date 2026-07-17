<?php
session_start();
$locker=1;
include_once('database.php');


$css_path = 'assets/css/style.css';
$root_path = '';
include 'includes/header.php';
if (isset($_SESSION['id'])) {
    header("location:'$dashboard'");
    # code...
}
if (isset($_POST['register'])) {
    $errormsg="";
    $fullname=mysqli_real_escape_string($conn,$_POST['full_name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password=mysqli_real_escape_string($conn,$_POST['confirm_password']);
    # code...
    $hashed_password=password_hash($password,PASSWORD_DEFAULT);
    $sql="SELECT * FROM users WHERE email = '$email'";
    $execute=mysqli_query($conn,$sql);
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errormsg='email not valid try again';
        # code...
    }elseif (strlen($password)< 6) {
        $errormsg='password has to be at least 6 characters';}

        # code...
    elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[^a-zA-Z0-9]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errormsg='invalid password';
        # code...
    }elseif ($password !== $confirm_password) {
        $errormsg='passwords confirmation failed try again';
        # code...
    }
    elseif(!preg_match('/^(\+?234|0)[789][01][0-9]{8}$/', $phone)) {
    $errormsg='invalid phone number';
    } elseif (!preg_match('/^[\p{L}\s\-\']{4,50}$/u', $fullname)) {
    $errormsg="The name format is not valid.";}
    elseif ($execute->num_rows==1) {
        $errormsg= 'user already exists';
        # code...
    }else {
        $query="INSERT INTO users (email, phone_no, password, full_name) VALUES('$email', '$phone', '$hashed_password', '$fullname')";
        $result=mysqli_query($conn,$query);
        if ($result) {
            header("location: $login_page");
            # code...
        }
        else{
            $errormsg='you are not registered yet ... Please try again';
        }
    }


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
                <p class="text-muted">Create a new account</p>
            </div>

            <!-- Register Form -->
            <form action="register.php" method="post">
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
                <!-- Full Name -->
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="full_name" name="full_name"
                               placeholder="Enter your full name" required>
                    </div>
                </div>

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

                <!-- Phone Number -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="tel" class="form-control" id="phone" name="phone"
                               placeholder="Enter your phone number" required>
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
                               placeholder="Create a password" required>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                               placeholder="Confirm your password" required>
                    </div>
                </div>

                <!-- Terms & Conditions -->
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="#" class="text-primary">Terms of Service</a> and
                            <a href="#" class="text-primary">Privacy Policy</a>
                        </label>
                    </div>
                </div>

                <!-- Register Button -->
                <button type="submit" class="btn btn-primary w-100 py-2 mb-3" name="register">
                    <i class="fas fa-user-plus me-2"></i>Register
                </button>

                <!-- Divider -->
                <div class="text-center mb-3">
                    <span class="text-muted">OR</span>
                </div>

                <!-- Login Link -->
                <a href="login.php" class="btn btn-outline-primary w-100 py-2">
                    <i class="fas fa-sign-in-alt me-2"></i>Login to Existing Account
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
