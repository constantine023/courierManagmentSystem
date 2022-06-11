<?php
require_once "db_connect.php";

session_start();
error_reporting(0);

if(!isset($_SESSION['admin'])) {
  header("Location: login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Delivered couriers</title>
</head>

<body>
    <?php
      require_once "navbar.php";
    ?>
  <!-- table  -->
  <table class="table table-striped" style="margin-top: 25px;">
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
    $sql = "SELECT * FROM `parcels` WHERE Status='delivered'";
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
    } 
?>
  </table>
</body>

</html>