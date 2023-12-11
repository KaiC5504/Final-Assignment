<?php 
    require('connect.php');
    session_start();

    if (isset($_GET['user_id'])) { 
        $user_id = $_GET['user_id'];
        
        $sql = "DELETE FROM users WHERE user_id = '$user_id'";

        if ($con->query($sql) === TRUE) {
            $_SESSION['deleted'] = true;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "Error deleting record: " . $con->error;
        }

    }

    $con->close();
?>