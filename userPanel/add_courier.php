<?php
require_once "db_connect.php";
session_start();

if(!isset($_SESSION['username'])) {
  header("Location: index.php");
}

if(isset($_POST['submit'])) {
  // sender's info
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $zip = $_POST['zip'];
   $state = $_POST['region'];
   // Reciever's info
   $recname = $_POST['ship-name'];
   $recphone = $_POST['ship-phone'];
   $recemail = $_POST['ship-email'];
   $recstreet = $_POST['ship-street'];
   $reccity = $_POST['ship-city'];
   $reczip = $_POST['ship-zip'];
   $recstate = $_POST['ship-region'];
  //  shipment info
   $couriertype = $_POST['ship-type'];   
   $courierweight = $_POST['weight'];
   $couriercomment = $_POST['comments'];

   $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
   $consignment = substr(str_shuffle($permitted_chars), 0, 10);
   $sql = "INSERT INTO `parcels` (`consignment`, `username`, `sender name`, `sender phone`, `sender email`, `sender city`, `sender zip code`, `sender street`, `sender state`, `reciever name`, `reciever phone`, `reciever email`, `receiver city`, `receiver zip code`, `receiver street`, `receiver state`, `courier type`, `courier weight`, `comment`, `payment`, `Status`, `date`) VALUES ('$consignment', '$_SESSION[username]', '$name', '$phone', '$email', '$city', '$zip', '$street', '$state', '$recname', '$recphone', '$recemail', '$reccity', '$reczip', '$recstreet', '$recstate', '$couriertype', '$courierweight', '$couriercomment', '', 'To be approved', current_timestamp());";

   $result = mysqli_query($conn, $sql);
   if($result) {
       echo "<div class='alert alert-success' id='alert' role='alert'>
       <strong>Your courier has been placed! CLick here to see: <a href='userPanel.php'>Courier</a></strong>!</button>
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
    <title>Add courier</title>
    <link rel="stylesheet" href="../userPanel/CSS Files/add_courier.css">
  </head>
  <body>
    <div class="testbox">
      <form action="" method="POST">
        <div class="banner">
          <h1>Add courier</h1>
        </div>
        <h2>Shipper info</h2>
        <div class="item">
          <p>Full name</p>
          <div class="name-item">
            <input type="text" name="name" placeholder="First"  required>
            <input type="text" name="phone" placeholder="Phone"   required/>
          </div>
        </div>
        <div class="item">
          <p>Email</p>
          <input type="email" name="email" placeholder="email"   required/>
        </div>
        <div class="item">
          <p>Address</p>
          <input type="text" name="street" placeholder="Street address"   required/>
          <div class="city-item">
            <input type="text" name="city" placeholder="City"   required/>
            <input type="text" name="region" placeholder="Region"   required>
            <input type="text" name="zip" placeholder="Postal / Zip code"   required/>
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
            <input type="text" name="ship-name" placeholder="Full name"   required/>
            <input type="text" name="ship-phone" placeholder="Phone"   required/>
          </div>
        </div>
        <div class="item">
          <p>Email</p>
          <input type="email" name="ship-email" placeholder="email"   required/>
        </div>
        <div class="item">
          <p>Address</p>
          <input type="text" name="ship-street" placeholder="Street address"   required/>
          <div class="city-item">
            <input type="text" name="ship-city" placeholder="City"   required/>
            <input type="text" name="ship-region" placeholder="Region"   required/>
            <input type="text" name="ship-zip" placeholder="Postal / Zip code"   required/>
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
        <input type="text" name="weight" placeholder="in kg (optional)" />
        <div class="item">
          <p>Date</p>
          <input type="date" name="date" id="date">
          <i class="fas fa-calendar-alt"></i>
        </div>
        <label for="comments">Comment</label>
        <input type="text" name="comments">
        <input type="submit" name="submit" class="btn btn-primary">
      </form>
    </div>
    <script>
    const myTimeout = setTimeout(alert, 3000);

    function alert() {
      document.getElementById("alert").style.display = "none"
      location.href="http://localhost/darcel/userPanel/userPanel.php"
    }
  </script>
  </body>
</html>