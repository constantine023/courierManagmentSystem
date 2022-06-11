<?php
require_once "db_connect.php";
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}

if(isset($_GET['consignment'])) {
  $search = $_GET['consignment'];
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM `parcels` WHERE consignment='$search' AND username='$username'";
  $res = mysqli_query($conn, $sql);
  if ($res) {
    $row = mysqli_fetch_assoc($res);    
    if (!$search == $row['consignment']) {
      header('Location: userpanel.php');
    }
  }
}else {
  header('Location: userpanel.php');
}

  // Updating form 
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $state = $_POST['state'];
    // Reciever's info
    $recname = $_POST['ship-name'];
    $recphone = $_POST['ship-phone'];
    $recemail = $_POST['ship-email'];
    $recstreet = $_POST['ship-street'];
    $reccity = $_POST['ship-city'];
    $reczip = $_POST['ship-zip'];
    $recstate = $_POST['ship-state'];
   //  shipment info
    $couriertype = $_POST['ship-type'];
    $courierweight = $_POST['weight'];
    $couriercomment = $_POST['comments'];
    
    $sql = "UPDATE `parcels` SET `sender name` = '$name', `sender phone` = '$phone', `sender email` = '$email', `sender city` = '$city', `sender zip code` = '$zip', `sender street` = '$street', `sender state` = '$state', `reciever name` = '$recname', `reciever phone` = '$recphone', `reciever email` = '$recemail', `receiver city` = '$reccity', `receiver zip code` = '$reczip', `receiver street` = '$recstreet', `receiver state` = '$recstate', `courier type` = '$couriertype', `courier weight` = '$courierweight', `comment` = '$couriercomment', `Status` = 'to be approved' WHERE `parcels`.`Consignment` = '$search';";
 
    $result = mysqli_query($conn, $sql);
    if($result) {
      echo "<div class='alert alert-success' id='alert' role='alert' id='alert'>
      <strong>Your courier has been updated! CLick here to see: <a href='userpanel.php'>Courier</a></strong>!</button>
    </div>";
    }
    else {
        echo "<script>alert('Technical  error')</script>";
    }   
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update courier</title>
  <link rel="stylesheet" href="add_courier.css">
</head>
<body>
  <div class="testbox">
    <form action="" method="POST">
      <div class="banner">
        <h1>Update courier</h1>
      </div>
      <h2>Shipper info</h2>
      <div class="item">
        <p>Full name</p>
        <div class="name-item">
          <input type="text" name="name" placeholder="First" value="<?php echo $row['sender name'] ?>">
          <input type="number" name="phone" placeholder="Phone" value="<?php echo $row['sender phone'] ?>" />
        </div>
      </div>
      <div class="item">
        <p>Email</p>
        <input type="email" name="email" placeholder="email" value="<?php echo $row['sender email'] ?>">
      </div>
      <div class="item">
        <p>Address</p>
        <input type="text" name="street" placeholder="Street address" value="<?php echo $row['sender street'] ?>" />
        <div class="city-item">
          <input type="text" name="city" placeholder="City" value="<?php echo $row['sender city'] ?>" />
          <input type="text" name="state" placeholder="State" value="<?php echo $row['sender state'] ?>" />
          <input type="text" name="zip" placeholder="Postal / Zip code" value="<?php echo $row['sender zip code'] ?>" />
          <select>
            <option value="">Country</option>
            <option value="">India</option>
            <option value="1">Russia</option>
            <option value="2">Germany</option>
            <option value="3">France</option>
            <option value="4">Armenia</option>
            <option value="5">USA</option>
          </select>
        </div>
      </div>
      <h2>Reciever info</h2>
      <div class="item">
        <p>Full name</p>
        <div class="name-item">
          <input type="text" name="ship-name" placeholder="Full name" value="<?php echo $row['reciever name'] ?>" />
          <input type="number" name="ship-phone" placeholder="Phone" value="<?php echo $row['reciever phone'] ?>" />
        </div>
      </div>
      <div class="item">
        <p>Email</p>
        <input type="email" name="ship-email" placeholder="email" value="<?php echo $row['reciever email'] ?>" />
      </div>
      <div class="item">
        <p>Address</p>
        <input type="text" name="ship-street" placeholder="Street address"
          value="<?php echo $row['receiver street'] ?>" />
        <div class="city-item">
          <input type="text" name="ship-city" placeholder="City" value="<?php echo $row['receiver city'] ?>" />
          <input type="text" name="ship-state" placeholder="State" value="<?php echo $row['receiver state'] ?>" />
          <input type="text" name="ship-zip" placeholder="Postal / Zip code"
            value="<?php echo $row['receiver zip code'] ?>" />
          <select name="country">
            <option value="">Country</option>
            <option value="">India</option>
            <option value="1">Russia</option>
            <option value="2">Germany</option>
            <option value="3">France</option>
            <option value="4">Armenia</option>
            <option value="5">USA</option>
          </select>
        </div>
      </div>
      <h2>Shippment Details</h2>
      <div class="item">
        <p>Shippment type</p>
        <select name="ship-type">
            <option value="Documents">Select type</option>
            <option value="Documents">Documents</option>
            <option value="Clothes">Clothes</option>
            <option value="Electronic item">Electronic item</option>
            <option value="Material">Material</option>
            <option value="Others">Others</option>
          </select>
      </div>
      <p>Weight</p>
      <input type="text" name="weight" placeholder="in kg" value="<?php echo $row['courier weight'] ?>" />
      <div class="item">
        <p>Date</p>
        <input type="date" name="date" />
        <i class="fas fa-calendar-alt"></i>
      </div>
      <label for="comments">Comment</label>
      <input type="text" name="comments" id="comments" value="<?php echo $row['comment'] ?>">
      <input type="submit" name="submit" value="Update" class="btn btn-primary">
    </form>
  </div>
  <script>
    const myTimeout = setTimeout(alert, 3000);

    function alert() {
      document.getElementById("alert").style.display = "none"
      location.href="http://localhost/darcel/userpanel/userpanel.php"
    }
  </script>
</body>

</html>