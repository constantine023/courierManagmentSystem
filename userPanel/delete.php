<?php

require_once "db_connect.php";
session_start();

if (isset($_GET['consignment'])) {
    $consignment = $_GET['consignment'];
    $username = $_SESSION['username'];
        $sql = "DELETE FROM `parcels` WHERE consignment = '$consignment' AND username='$username'";
        $resdlt = mysqli_query($conn, $sql);
        if($resdlt) {
            header("Location: userPanel.php");
        }else {
            echo "Error";
        }
    }else {
        echo "Technical issues";
    }
?>