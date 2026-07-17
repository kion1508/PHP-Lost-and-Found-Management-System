<?php
$locker=1;
include_once('C:\xampp\htdocs\project\LostFoundSystem\database.php');

// Start the session cleanly if it hasn't been started yet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$full_name = '';

if (isset($_SESSION['id'])) {

    $id = $_SESSION['id'];

    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $full_name = $row['full_name'];
    }
}

// Get current page for active state detection
$current_page = basename($_SERVER['PHP_SELF']);

// Check if we're on an auth page (login, register)
$is_auth_page = in_array($current_page, ['login.php', 'register.php']);
?>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/project/LostFoundSystem/index.php">
            <i class="fas fa-box-open"></i>
            Lost & Found
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?>" href="/project/LostFoundSystem/index.php">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $current_page == 'search.php' ? 'active' : ''; ?>" href="/project/LostFoundSystem/pages/search.php">
                        <i class="fas fa-search me-1"></i> Search
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="reportDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-clipboard-list me-1"></i> Report
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="reportDropdown">
                        <li>
                            <a class="dropdown-item" href="/project/LostFoundSystem/pages/report_lost.php">
                                <i class="fas fa-question-circle text-warning me-2"></i> Lost Item
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/project/LostFoundSystem/pages/report_found.php">
                                <i class="fas fa-check-circle text-success me-2"></i> Found Item
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php if (!isset($_SESSION['id'])):  ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'login.php' ? 'active' : ''; ?>" href="/project/LostFoundSystem/login.php">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'register.php' ? 'active' : ''; ?>" href="/project/LostFoundSystem/register.php">
                            <i class="fas fa-user-plus me-1"></i> Register
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/project/LostFoundSystem/pages/dashboard.php">
                            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> <?php echo isset($full_name) ? $full_name : 'User'; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <!-- <li>
                                <a class="dropdown-item" href="/project/LostFoundSystem/pages/profile.php">
                                    <i class="fas fa-user me-2"></i> My Profile
                                </a>
                            </li> -->
                            <li>
                                <a class="dropdown-item" href="/project/LostFoundSystem/pages/my_reports.php">
                                    <i class="fas fa-list-alt me-2"></i> My Reports
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="/project/LostFoundSystem/logout.php">
                                    <i class="fas fa-sign-out-alt me-2 text-danger"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <button class="theme-toggle" id="themeToggle" title="Toggle Dark Mode">
                        <i class="fas fa-moon" id="themeIcon"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const html = document.documentElement;

    const savedTheme = localStorage.getItem('theme') || 'light';
    html.setAttribute('data-theme', savedTheme);
    updateThemeIcon(savedTheme);

    themeToggle.addEventListener('click', function() {
        const currentTheme = html.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        html.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateThemeIcon(newTheme);
    });

    function updateThemeIcon(theme) {
        themeIcon.className = theme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
    }
</script>