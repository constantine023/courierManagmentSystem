<?php

  require_once "db_connect.php";
  session_start();

  if(!isset($_SESSION['admin'])) {
  header("Location: login.php");
  }
  
    if(isset($_GET['consignment'])){

      $record = $_GET['consignment'];

      $sql_del_query = "DELETE FROM `parcels` WHERE `parcels`.`consignment` = '$record';";
      $delete = mysqli_query($conn, $sql_del_query);
      if($delete) {
        echo "<script> alert('Record deleted succesfulyy')</script>"; 
      }
      else {
        echo "<script> alert('Error')</script>"; 
      }
    }

if(isset($_POST['submit'])) {

  if($_POST['search']== "") {
    echo "<script>alert('Enter consignment number')</script>";
  } else {
    $search = $_POST['search'];
    $_SESSION['search'] = $search;
    $sql = "SELECT * FROM `parcels` WHERE consignment='$search'";    
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    if($search == $row['consignment']) {
      header('Location: search.php');
    } else {
      echo "<script>alert('Enter correct consignment number')</script>";
    }
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
  <title>All couriers</title>
  <style>
    .container{
      position: absolute;
      top: 87px;
      left: 100px;
    }
  </style>
</head>

<body>

<?php
    include "navbar.php";
?>

<div class="container">
  <!-- <select name="sort" id="sort">
    <option value="approved"><a href="showall.php">approved</a></option>
    <option value="">to be approved</option>
    <option value="">Delivered</option>
  </select> -->
    <!-- table  -->
    <table class="table table-striped">
    <thead> 
        <tr>
        <th scope="col">Sno.</th>
        <th scope="col">Consignment number</th>
        <th scope="col">Sender number</th>
        <th scope="col">Reciever's name</th>
        <th scope="col">Courier type</th>
        <th scope="col">Comment</th>
        <th scope="col">Date added</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
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
        <td><a href = 'courier.php?consignment=$row[consignment]'class='btn btn-primary'>Update</a> <a href = 'update_pending.php?consignment=$row[consignment]'class='btn btn-outline-dark'>Delete</a>  </td>
        </tr>";
    } 
  ?>
</div>
</body>
</html>