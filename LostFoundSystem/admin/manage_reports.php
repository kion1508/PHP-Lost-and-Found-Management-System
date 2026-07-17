<?php
/**
 * Admin Manage Reports Page
 * View and manage all reports in the system
 */
$css_path = '../assets/css/style.css';
$root_path = '../';
include '../includes/header.php';
?>
<body>
<?php include '../includes/navbar.php'; ?>

<div class="d-flex">
    <?php include '../includes/sidebar_admin.php'; ?>

    <!-- Main Content -->
    <div class="main-content flex-grow-1">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title"><i class="fas fa-clipboard-list text-primary me-2"></i>Manage Reports</h1>
                <p class="page-subtitle">View, edit, and manage all reported items</p>
            </div>
            <button class="btn btn-outline-secondary d-lg-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Filter Bar -->
        <div class="card mb-4 fade-in">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-2 mb-3 mb-md-0">
                        <select class="form-select" id="filter_type">
                            <option value="">All Types</option>
                            <option value="lost">Lost Items</option>
                            <option value="found">Found Items</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3 mb-md-0">
                        <select class="form-select" id="filter_category">
                            <option value="">All Categories</option>
                            <option value="electronics">Electronics</option>
                            <option value="keys">Keys</option>
                            <option value="bags">Bags</option>
                            <option value="cards">Cards & IDs</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3 mb-md-0">
                        <select class="form-select" id="filter_status">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="claimed">Claimed</option>
                            <option value="returned">Returned</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <input type="text" class="form-control" id="filter_search" placeholder="Search by ID, item name, or user...">
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
                <span><i class="fas fa-table me-2"></i>All Reports (1,250)</span>
                <div class="btn-group">
                    <button class="btn btn-outline-primary btn-sm" title="Export to Excel">
                        <i class="fas fa-file-excel me-1"></i>Export
                    </button>
                    <button class="btn btn-outline-secondary btn-sm" title="Print">
                        <i class="fas fa-print me-1"></i>Print
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th>Report ID</th>
                                <th>User</th>
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
                                <td><input type="checkbox" class="form-check-input row-checkbox"></td>
                                <td><strong>#LFT-301</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=John+Doe&size=30&rounded=true&background=2563EB&color=ffffff" alt="avatar" class="me-2">
                                        <div>
                                            <strong>John Doe</strong><br>
                                            <small class="text-muted">john.doe@university.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <i class="fas fa-mobile-alt text-primary me-1"></i>
                                    iPhone 14 Pro
                                </td>
                                <td>Electronics</td>
                                <td><span class="badge bg-warning">Lost</span></td>
                                <td>
                                    <select class="form-select form-select-sm status-select" style="min-width: 100px;">
                                        <option value="pending" selected>Pending</option>
                                        <option value="claimed">Claimed</option>
                                        <option value="returned">Returned</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </td>
                                <td>Jul 3, 2026</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="../pages/item_details.php" class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-check-input row-checkbox"></td>
                                <td><strong>#FND-302</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Jane+Smith&size=30&rounded=true&background=10B981&color=ffffff" alt="avatar" class="me-2">
                                        <div>
                                            <strong>Jane Smith</strong><br>
                                            <small class="text-muted">jane.smith@university.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <i class="fas fa-key text-success me-1"></i>
                                    Car Keys (Toyota)
                                </td>
                                <td>Keys</td>
                                <td><span class="badge bg-success">Found</span></td>
                                <td>
                                    <select class="form-select form-select-sm status-select" style="min-width: 100px;">
                                        <option value="pending">Pending</option>
                                        <option value="claimed" selected>Claimed</option>
                                        <option value="returned">Returned</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </td>
                                <td>Jul 2, 2026</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="../pages/item_details.php" class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-check-input row-checkbox"></td>
                                <td><strong>#LFT-303</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Mike+Brown&size=30&rounded=true&background=F59E0B&color=ffffff" alt="avatar" class="me-2">
                                        <div>
                                            <strong>Mike Brown</strong><br>
                                            <small class="text-muted">mike.brown@university.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <i class="fas fa-graduation-cap text-primary me-1"></i>
                                    Blue Backpack
                                </td>
                                <td>Bags</td>
                                <td><span class="badge bg-warning">Lost</span></td>
                                <td>
                                    <select class="form-select form-select-sm status-select" style="min-width: 100px;">
                                        <option value="pending">Pending</option>
                                        <option value="claimed">Claimed</option>
                                        <option value="returned" selected>Returned</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </td>
                                <td>Jul 1, 2026</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="../pages/item_details.php" class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-check-input row-checkbox"></td>
                                <td><strong>#FND-304</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Sarah+Wilson&size=30&rounded=true&background=6366F1&color=ffffff" alt="avatar" class="me-2">
                                        <div>
                                            <strong>Sarah Wilson</strong><br>
                                            <small class="text-muted">sarah.wilson@university.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <i class="fas fa-glasses text-success me-1"></i>
                                    Ray-Ban Sunglasses
                                </td>
                                <td>Accessories</td>
                                <td><span class="badge bg-success">Found</span></td>
                                <td>
                                    <select class="form-select form-select-sm status-select" style="min-width: 100px;">
                                        <option value="pending" selected>Pending</option>
                                        <option value="claimed">Claimed</option>
                                        <option value="returned">Returned</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </td>
                                <td>Jun 30, 2026</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="../pages/item_details.php" class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-check-input row-checkbox"></td>
                                <td><strong>#LFT-305</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Tom+Davis&size=30&rounded=true&background=EC4899&color=ffffff" alt="avatar" class="me-2">
                                        <div>
                                            <strong>Tom Davis</strong><br>
                                            <small class="text-muted">tom.davis@university.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <i class="fas fa-id-card text-primary me-1"></i>
                                    Student ID Card
                                </td>
                                <td>Cards & IDs</td>
                                <td><span class="badge bg-warning">Lost</span></td>
                                <td>
                                    <select class="form-select form-select-sm status-select" style="min-width: 100px;">
                                        <option value="pending">Pending</option>
                                        <option value="claimed">Claimed</option>
                                        <option value="returned">Returned</option>
                                        <option value="closed" selected>Closed</option>
                                    </select>
                                </td>
                                <td>Jun 28, 2026</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="../pages/item_details.php" class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-check-input row-checkbox"></td>
                                <td><strong>#FND-306</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Emily+Chen&size=30&rounded=true&background=8B5CF6&color=ffffff" alt="avatar" class="me-2">
                                        <div>
                                            <strong>Emily Chen</strong><br>
                                            <small class="text-muted">emily.chen@university.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <i class="fas fa-book text-success me-1"></i>
                                    Physics Textbook
                                </td>
                                <td>Books</td>
                                <td><span class="badge bg-success">Found</span></td>
                                <td>
                                    <select class="form-select form-select-sm status-select" style="min-width: 100px;">
                                        <option value="pending">Pending</option>
                                        <option value="claimed">Claimed</option>
                                        <option value="returned" selected>Returned</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </td>
                                <td>Jun 26, 2026</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="../pages/item_details.php" class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-check-input row-checkbox"></td>
                                <td><strong>#LFT-307</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Alex+Johnson&size=30&rounded=true&background=14B8A6&color=ffffff" alt="avatar" class="me-2">
                                        <div>
                                            <strong>Alex Johnson</strong><br>
                                            <small class="text-muted">alex.johnson@university.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <i class="fas fa-watch text-primary me-1"></i>
                                    Apple Watch
                                </td>
                                <td>Electronics</td>
                                <td><span class="badge bg-warning">Lost</span></td>
                                <td>
                                    <select class="form-select form-select-sm status-select" style="min-width: 100px;">
                                        <option value="pending" selected>Pending</option>
                                        <option value="claimed">Claimed</option>
                                        <option value="returned">Returned</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </td>
                                <td>Jun 24, 2026</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="../pages/item_details.php" class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-check-input row-checkbox"></td>
                                <td><strong>#FND-308</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Lisa+Park&size=30&rounded=true&background=F97316&color=ffffff" alt="avatar" class="me-2">
                                        <div>
                                            <strong>Lisa Park</strong><br>
                                            <small class="text-muted">lisa.park@university.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <i class="fas fa-umbrella text-success me-1"></i>
                                    Black Umbrella
                                </td>
                                <td>Accessories</td>
                                <td><span class="badge bg-success">Found</span></td>
                                <td>
                                    <select class="form-select form-select-sm status-select" style="min-width: 100px;">
                                        <option value="pending">Pending</option>
                                        <option value="claimed" selected>Claimed</option>
                                        <option value="returned">Returned</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </td>
                                <td>Jun 22, 2026</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="../pages/item_details.php" class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Pagination & Bulk Actions -->
            <div class="card-footer bg-transparent">
                <div class="row align-items-center">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <select class="form-select form-select-sm">
                            <option>Bulk Actions</option>
                            <option>Mark as Pending</option>
                            <option>Mark as Claimed</option>
                            <option>Mark as Returned</option>
                            <option>Mark as Closed</option>
                            <option>Delete Selected</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3 mb-md-0">
                        <button class="btn btn-sm btn-outline-secondary">Apply</button>
                    </div>
                    <div class="col-md-7">
                        <nav aria-label="Reports pagination">
                            <ul class="pagination pagination-sm justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">125</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-trash text-danger me-2"></i>Delete Report
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this report? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">
                    <i class="fas fa-trash me-1"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
