<?php

require_once "db_connect.php";
session_start();
error_reporting(0);

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
  }
  
$consignment = $_GET['consignment'];
if(isset($_GET['consignment'])) {

    $sql = "SELECT * FROM `parcels` WHERE consignment = '$consignment'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    if(!$consignment == $row['consignment']) {       
        echo "<script> alert('Wrong consignment number')</script>";
        header('Location: userPanel.php');
    }
}
else{
    header('Location: userPanel.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../userPanel/CSS Files/parcel.css">
    <title>Courier</title>
</head>

<body>
    <h2 style="margin-left: 620px; margin-top: -5px; font-size: 43px; margin-bottom: 20px;">Your Courier</h2>
    <h3 style="position: absolute; top: 48px; right: 294px;"><a id="updateLink" href="update.php?consignment=<?php echo "$row[consignment]" ?>">Update</a></h3>
    <div class="reciept">
        <div class="container">
            <div class="shipper">
                <div class="detail">
                    <p>Shipper name:</p>
                    <p>Shipper phone:</p>
                    <p>Shipper Email:</p>
                    <p>Shipper address:</p>
                </div>
                <div class="info" style="margin-left: 10px">
                    <p>
                        <?php echo $row['sender name'] ?>
                    </p>
                    <p>
                        <?php echo $row['sender phone'] ?>
                    </p>
                    <p>
                        <?php echo $row['sender email'] ?>
                    </p>
                    <p>
                        <?php echo $row['sender street'] ?>
                    </p>
                    <p>
                        <?php echo $row['sender city'] ?>
                    </p>
                    <p>
                        <?php echo $row['sender zip code'] ?>
                    </p>
                    <p>
                        <?php echo $row['sender state'] ?>
                    </p>

                </div>
            </div>
            <div class="receiver">
                <div class="detail">
                    <p>Reciever name:</p>
                    <p>Reciever phone:</p>
                    <p>Reciever Email:</p>
                    <p>Reciever address:</p>
                </div>
                <div class="info" style="margin-left: 10px">
                    <p>
                        <?php echo $row['reciever name'] ?>
                    </p>
                    <p>
                        <?php echo $row['reciever phone'] ?>
                    </p>
                    <p>
                        <?php echo $row['reciever email'] ?>
                    </p>
                    <p>
                        <?php echo $row['reciever address'] ?>
                    </p>
                    <p>
                        <?php echo $row['receiver street'] ?>
                    </p>
                    <p>
                        <?php echo $row['receiver city'] ?>
                    </p>
                    <p>
                        <?php echo $row['receiver zip code'] ?>
                    </p>
                    <p>
                        <?php echo $row['receiver state'] ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="courier">
            <div class="parcel" style="text-align: end; margin-top: 100px">
                <p>Consinment number:</p>
                <p>Courier type:</p>
                <p>Weight:</p>
                <p>Comment:</p>
                <p>Status:</p>
            </div>
            <div class="info" style="margin-left: 25px; margin-top: 100px">
                <p>
                    <?php echo $row['consignment'] ?>
                </p>
                <p>
                    <?php if($row['courier type']==""){echo "<br>";} else{echo $row['courier type'];} ?>
                </p>
                <p>
                    <?php if($row['courier weight']==""){echo "<br>";} else{echo $row['courier weight'];} ?>
                </p>
                <p>
                    <?php if($row['comment']==""){echo "<br>";} else{echo $row['comment'];} ?>
                </p>
                <p>
                    <?php echo $row['Status'] ?>
                </p>
            </div>
        </div>
</body>
</html>