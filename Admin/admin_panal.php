<?php 

require "db_connect.php";
session_start();
error_reporting(0);
if(!isset($_SESSION['admin'])) {
  header("Location: login.php");
}

if(isset($_POST['submit'])) {
    $search = $_POST['search'];
    $_SESSION['search'] = $search;
    $sql = "SELECT * FROM `parcels` WHERE consignment='$search'";    
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    
      if ($search == $row['consignment']) {
        header('Location: courier.php');
      }else {
        echo "<script>alert('Enter correct consignment number')</script>";
      }
  }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../Admin/CSS Files/adminPanel.css">
  <title>Admin</title>
</head>

<body>

  <?php
    require_once "navbar.php";
  ?>

  <div class="container">
    <form action="courier.php?consignment=$row[consignment]">
      <div class="search-box">
        <div class="form-outline">
          <input type="text" id="search" name="consignment" placeholder="Enter consignment number"
            class="form-control my-2" required />
          <input type="submit" value="Show" id="searchbtn" class="btn btn-outline-dark">
        </div>
    </form>
  </div>

  <!-- table  -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Sno.</th>
        <th scope="col">Consignment number</th>
        <th scope="col">Sender name</th>
        <th scope="col">Reciever's name</th>
        <th scope="col">Courier type</th>
        <th scope="col">Comment</th>
        <th scope="col">Date added</th>
        <th scope="col">Status</th>
      </tr>
    </thead>

    <?php
    require_once "db_connect.php";

    $sql = "SELECT * FROM `parcels`";
    $result = mysqli_query($conn , $sql);
    $sno = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $sno = $sno + 1;
        echo "<tr>
        <th scope='row'>". $sno . "</th>
        <td>". $row['consignment'] . "</td>
        <td>". $row['sender name'] . "</td>
        <td>". $row['reciever name'] . "</td>
        <td> ". $row['courier type'] ."</td>
        <td> ". $row['comment'] ."</td>
        <td> ". $row['date'] ."</td>
        <td> ". $row['Status'] ."</td>
      </tr>";
      if($sno>8) {
        break;
      }
    } 
  ?>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>