<?php
/**
 * Header Include File
 * Contains meta tags, CSS links, and common head elements
 */

// Get current page for active state detection
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lost & Found Item Management System - Report and recover lost items in your university or school">
    <meta name="keywords" content="lost and found, university, school, item recovery">
    <title>Lost & Found System | <?php echo ucfirst(str_replace(['.php', '_'], ['', ' '], $current_page)); ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="<?php echo isset($css_path) ? $css_path : 'assets/css/style.css'; ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo isset($root_path) ? $root_path : ''; ?>assets/icons/favicon.ico">
</head>
