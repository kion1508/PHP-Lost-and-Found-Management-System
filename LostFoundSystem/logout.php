<?php
// Ensure the database config is pulled in (using your path)
include_once('C:\xampp\htdocs\project\LostFoundSystem\database.php');

// Start the session if it hasn't been started yet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Clear and destroy the session
$_SESSION = array();
session_destroy();

// If $login_page is defined in your database.php, this will work perfectly.
// If it isn't defined there, replace $login_page with 'login.php'
header("Location: $login_page"); 
exit();
?>