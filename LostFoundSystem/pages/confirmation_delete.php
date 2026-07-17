<?php
// Example
// $item_name = "iPhone 14 Pro"; // Replace this with the actual item name from your database
// $item_id = $_GET['id'] ?? '';
// echo$item_id
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once('C:\xampp\htdocs\project\LostFoundSystem\database.php');
 if (isset($_GET['id'])) {
    $item_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "
        SELECT report_lost_id AS tracking_id, email, item_name, description, category, last_loc, date_lost AS date_recorded, image, contact_no, 'Lost' AS item_type 
        FROM lost_items 
        WHERE report_lost_id = '$item_id'
        UNION
        SELECT report_found_id AS tracking_id, email, item_name, description, category, location_found, date_found AS date_recorded, image, contact_no, 'Found' AS item_type 
        FROM found_items 
        WHERE report_found_id = '$item_id' 
        LIMIT 1";
        $result = mysqli_query($conn, $query);
        $item = mysqli_fetch_assoc($result);

        $item_name       = $item['item_name'];
 }   
 if (substr($item_id, 0, 3) == 'LFT') {
    $table = 'lost_items';
} elseif (substr($item_id, 0, 3) == 'FND') {
    $table = 'found_items';
}
 if (isset($_GET['delete'])) {
    if ($table == 'lost_items') {
    $sql = "DELETE FROM lost_items WHERE report_lost_id='$item_id'";
    $execute=mysqli_query($conn,$sql);
    header('location: my_reports.php');
    } else {
        $sql = "DELETE FROM found_items WHERE report_found_id='$item_id'";
        $execute=mysqli_query($conn,$sql);

        header('location: my_reports.php');

    }
    # code...
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete Item</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:white;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    padding:20px;
}

.container{
    width:100%;
    max-width:550px;
    background:#fff;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 12px 30px rgba(255,0,0,.18);
}

.header{
    background:#c62828;
    color:#fff;
    text-align:center;
    padding:35px 20px;
}

.header i{
    font-size:65px;
    margin-bottom:10px;
}

.header h2{
    font-size:30px;
    word-wrap:break-word;
}

.content{
    padding:35px 30px;
    text-align:center;
}

.warning{
    color:#d32f2f;
    font-size:24px;
    font-weight:bold;
    margin-bottom:18px;
}

.message{
    color:#555;
    line-height:1.8;
    font-size:17px;
}

.item-name{
    color:#b71c1c;
    font-weight:bold;
}

.buttons{
    margin-top:35px;
    display:flex;
    justify-content:center;
    gap:15px;
    flex-wrap:wrap;
}

.btn{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
    text-decoration:none;
    padding:15px 25px;
    border-radius:8px;
    font-size:17px;
    font-weight:bold;
    transition:.3s;
    min-width:180px;
}

.delete{
    background:#d32f2f;
    color:#fff;
}

.delete:hover{
    background:#a80000;
    transform:translateY(-2px);
}

.cancel{
    background:#ececec;
    color:#333;
}

.cancel:hover{
    background:#d6d6d6;
    transform:translateY(-2px);
}

.note{
    margin-top:30px;
    color:#777;
    font-size:15px;
    line-height:1.6;
}

/* Tablet */
@media (max-width:768px){

    .header{
        padding:30px 20px;
    }

    .header i{
        font-size:55px;
    }

    .header h2{
        font-size:25px;
    }

    .warning{
        font-size:22px;
    }

    .message{
        font-size:16px;
    }

    .content{
        padding:30px 25px;
    }
}

/* Mobile */
@media (max-width:576px){

    body{
        padding:15px;
    }

    .container{
        border-radius:12px;
    }

    .header{
        padding:25px 15px;
    }

    .header i{
        font-size:48px;
    }

    .header h2{
        font-size:22px;
    }

    .content{
        padding:25px 20px;
    }

    .warning{
        font-size:20px;
    }

    .message{
        font-size:15px;
    }

    .buttons{
        flex-direction:column;
    }

    .btn{
        width:100%;
        min-width:100%;
    }

    .note{
        font-size:14px;
    }
}
</style>
</head>
<body>


<form action="confirmation_delete.php" method="get">
    <input type="hidden" name="id" value="<?php echo $item_id; ?>">

    <div class="container">

        <div class="header">
            <i class="fas fa-trash-alt"></i>
            <h2>Delete Item (<?php echo htmlspecialchars($item_name); ?>)</h2>
        </div>

        <div class="content">

            <p class="warning">
                Are you absolutely sure?
            </p>
            
            <p class="message">
                You are about to permanently delete
                <span class="item-name">
                    "<?php echo $item_id; ?>"
                </span>.
                <br><br>
                This action <strong>cannot be undone.</strong>
            </p>
            <div class="buttons">
            
               <button class="btn delete" name="delete">
                    <i class="fas fa-trash"></i>
                    Delete Item
                 </button>

                <a href="my_reports.php" class="btn cancel">
                    <i class="fas fa-times"></i>
                    Cancel
               </a>

            </div>

            <p class="note">
                Once deleted, this item and its information will be permanently removed from the system.
            </p>

        </div>

    </div>
</form>


</body>
</html>