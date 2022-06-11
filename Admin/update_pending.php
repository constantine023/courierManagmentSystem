<?php

  require_once "db_connect.php";
  session_start();

  if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
  }
  
  //Delete funcionality
    if(isset($_GET['consignment'])){

      $record = $_GET['consignment'];

      $sql_del_query = "DELETE FROM `parcels` WHERE `parcels`.`consignment` = '$record';";
      $delete = mysqli_query($conn, $sql_del_query);
      if($delete) {
        echo "<script> alert('Record Deleted')</script>"; 
      }
      else {
        echo "<script> alert('Error')</script>"; 
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Update</title>
  <style>
    .dropdown {
      position: absolute;
      right: 112px;
    }
  </style>
</head>

<body>
  <?php
      include "navbar.php";
    ?>

  <div class="container">
    <form action="courier.php?consignment=$row[consignment]">
      <div class="search-box">
        <div class="form-outline">
          <input type="text" id="search" name="consignment" placeholder="Enter consignment number"
            class="form-control my-2" required />
          <input type="submit" id="searchbtn" class="btn btn-outline-dark">
        </div>
    </form>
  </div>


  <h3 style="border: 2px solid grey; color: white; background-color: orange; padding: 6px; margin-top: 20px;">Pending
    couriers</h3>

  <!-- Table  -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Sno.</th>
        <th scope="col">Consignment number</th>
        <th scope="col">Sender name</th>
        <th scope="col">Reciever's name</th>
        <th scope="col">Courier type</th>
        <th scope="col">Date added</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <?php
    require_once "db_connect.php";

    $sql = "SELECT * FROM `parcels` WHERE Status='to be approved'";
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
        <td> ". $row['date'] ."</td>
        <td> ". $row['Status'] ."</td>
        <td><a href = 'courier.php?consignment=$row[consignment]'class='btn btn-primary'>Update</a> <a href = 'update_pending.php?consignment=$row[consignment]'class='btn btn-outline-dark'>Delete</a>  </td>
      </tr>";
    } 
?>
  </table>
</body>

</html>