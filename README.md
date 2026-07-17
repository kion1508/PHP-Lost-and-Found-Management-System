# PHP-Lost-and-Found-Management-System
A web-based Lost and Found Management System built with PHP to streamline reporting, tracking, and claiming lost items.

# Lost & Found Item Management System

A web-based **Lost & Found Item Management System** developed using **PHP** and **MySQL** to help students and staff efficiently report, search for, and recover lost or found items within a school or university environment.

The system provides a centralized platform where users can register, log in, report lost or found items, search existing reports, and track the status of their submissions. Administrators can manage reports, update item statuses, and oversee the overall operation of the system.

---

## Project Objectives

* Provide a centralized platform for managing lost and found items.
* Reduce the time required to recover misplaced belongings.
* Improve communication between individuals who lose items and those who find them.
* Maintain organized records of all lost and found reports.
* Provide administrators with tools to manage and monitor item reports.

---

## Features

### User Features

* User Registration
* Secure User Login
* User Dashboard
* Report Lost Items
* Report Found Items
* Search Items by Report ID or Category
* View Personal Reports
* Update Submitted Reports
* Delete Incorrect Reports
* View Item Details
* Track Report Status

### Administrator Features

* Admin Dashboard
* View All Reports
* Manage User Reports
* Update Item Status
* Mark Reports as:

  * Pending
  * Claimed
  * Returned
  * Closed
* Delete Invalid Reports

---

## Technologies Used

### Frontend

* HTML5
* CSS3
* Bootstrap 5
* Font Awesome Icons

### Backend

* PHP

### Database

* MySQL

### Development Environment

* XAMPP
* Apache Server
* phpMyAdmin

---

## Project Structure

```text
LostFoundSystem/

├── admin/
│   ├── dashboard.php
│   ├── manage_reports.php
│
├── assets/
│   ├── css/
│   ├── images/
│   └── icons/
│
├── includes/
│   ├── header.php
│   ├── navbar.php
│   ├── sidebar.php
│   └── footer.php
│
├── pages/
│   ├── dashboard.php
│   ├── report_lost.php
│   ├── report_found.php
│   ├── search.php
│   ├── my_reports.php
│   ├── item_details.php
│   └── profile.php
│
├── auth/
│   ├── login.php
│   ├── register.php
│   └── logout.php
│
├── database.php
├── index.php
└── README.md
```

---

## System Modules

### Authentication Module

Handles user registration, login, logout, and access control.

### Lost Item Module

Allows users to report lost items by providing item details, location, date, description, and contact information.

### Found Item Module

Allows users to submit reports for found items.

### Search Module

Users can search reports using:

* Item Report ID
* Item Category

### Report Management Module

Users can:

* View reports
* Edit reports
* Delete reports

### Admin Module

Administrators can:

* Review reports
* Update report statuses
* Manage all submitted records

---

## Item Status Workflow

Every submitted report is assigned one of the following statuses:

* **Pending** – Newly submitted report awaiting review.
* **Claimed** – The item has been claimed by its owner.
* **Returned** – The item has been successfully returned.
* **Closed** – The report has been completed and archived.

---

## Database Overview

The system stores information such as:

### Users

* Full Name
* Email Address
* Password
* Role

### Item Reports

* Report ID
* Item Name
* Category
* Description
* Location
* Report Type (Lost or Found)
* Contact Information
* Date Reported
* Status

---

## Security Features

The application includes:

* Password hashing
* Form validation
* Input sanitization
* SQL injection prevention using prepared statements
* XSS protection using output escaping
* Session-based authentication
* Role-based access control

---

## Installation

1. Install **XAMPP**.
2. Copy the project folder into the `htdocs` directory.
3. Start **Apache** and **MySQL** from the XAMPP Control Panel.
4. Create a MySQL database using phpMyAdmin.
5. Import the provided SQL database file.
6. Update the database connection settings in `database.php`.
7. Open your browser and navigate to:

```text
http://localhost/LostFoundSystem/
```

---

## Future Improvements

Possible enhancements include:

* Email notifications
* QR code generation for reports
* Image recognition for item matching
* Advanced filtering and search
* SMS notifications
* Real-time notifications
* Mobile-responsive enhancements
* Analytics dashboard
* Multi-school support
* Dark mode customization

---






