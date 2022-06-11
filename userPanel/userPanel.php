<?php 
    require_once "db_connect.php";
    session_start();
    if (!isset($_SESSION['username'])) {
      header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="welcome css.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="../userPanel/CSS Files/userPanel.css">
  <title>Welcome</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-light bg-dark">
    <a class="navbar-brand" href="userPanel.php" style="color: white; font-family: cursive;">
      <?php echo "<h1>Welcome, " . $_SESSION['username'] . "</h1>"; ?>
    </a>
    <button id="logout" type="button" class="btn btn-outline-dark" style="border: 2px solid white; margin-right: 10px"> Log out </button>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Courier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Update function -->
        <div class="modal-body">
          <form action="update.php?consignment=$row[consignment]">
            <input type="text" name="consignment" placeholder="Enter consignment number" id="searchCourier" required>
            <div class="modal-footer">
              <input type="submit" value="Update" class="btn btn-secondary">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Buttons  -->
  <div class="container">
    <div class="buttons">
      <button type="button" class="btn btn-outline-primary btn-lg" id="addbtn">Add courier</button>
      <button type="button" class="btn btn-outline-info btn-lg" id="updatebtn">Track courier</button>
      <button id="myModal" type="button" class="btn btn-outline-secondary" data-toggle="modal"
        data-target="#exampleModalCenter"> Update Courier </button>
    </div>
    
    <!-- Track courier  -->
    <form action="parcel.php?consignment=$row[consignment]">
      <div class="search-box">
        <div class="form-outline">
          <input type="text" id="search" name="consignment" placeholder="Enter consignment number"
            class="form-control my-2" required />
          <input type="submit" value="Track" id="searchbtn" class="btn btn-outline-info">
        </div>
      </div>
    </form>
  </div>

  <!-- table  -->
  <table class="table table-striped" style="width: 67%; position: absolute; left: 289px;">
    <thead>
      <tr>
        <th scope="col">Sno.</th>
        <th scope="col">Consignment number</th>
        <th scope="col">Reciever's name</th>
        <th scope="col">Courier type</th>
        <th scope="col">Comment</th>
        <th scope="col">Date added</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <!-- PHP script to show tables  -->
      <?php
      require_once "db_connect.php";
      $username = $_SESSION['username'];
      
      $sql = "SELECT * FROM `parcels` WHERE username='$username'";
      $result = mysqli_query($conn , $sql);
      $sno = 0;
      while($row = mysqli_fetch_assoc($result)) {
        $sno = $sno + 1;
        echo "<tr>
          <th scope='row'>". $sno . "</th>
          <td>". $row['consignment'] . "</td>
          <td>". $row['reciever name'] . "</td>
          <td> ". $row['courier type'] ."</td>
          <td> ". $row['comment'] ."</td>
          <td> ". $row['date'] ."</td>
          <td> ". $row['Status'] ."</td>
          <td><a href = 'parcel.php?consignment=$row[consignment]'class='btn btn-primary' style='margin-bottom: 2px'>Show</a> <a href = 'delete.php?consignment=$row[consignment]'class='btn btn-outline-dark'>Delete</a> </td>
        </tr>";
      } 
      ?>
  </table>
  <script>
    add_button = document.getElementById('addbtn');
    add_button.addEventListener('click', () => {
      location.href = "add_courier.php";
      $('#myModal').modal(options)
    })
    document.getElementById('updatebtn').onclick = function () {
      document.getElementById('search').focus();
    };
    logout = document.getElementById("logout");
    logout.addEventListener('click', () => {
      location.href = "logout.php";
    })  
  </script>
</body>
</html>
</div>