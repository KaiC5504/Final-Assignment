<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require('connect.php');
    session_start();

    if (isset($_GET['user_id'])) { 
        $user_id = $_GET['user_id'];
        
        $sql = "DELETE FROM users WHERE user_id = '$user_id'";

        if ($con->query($sql) === TRUE) {
            header("Location: admin_dashboard.php");
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $con->error;
        }

    }

    $con->close();
?>