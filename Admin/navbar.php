<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Home</title>
  <style>
    body {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .dropdown {
      position: absolute;
      right: 112px;
    }

    .btn-dark {
      position: absolute;
      right: 16px;
      top: 14px;
      border: 2px solid white;
      width: 83px;
    }

    a {
      text-decoration: none;
      color: white;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-light bg-dark">
    <a class="navbar-brand" href="admin_panal.php" style="color: white; font-family: cursive;">
      <h3 style="font-family: sans-serif;">Welcome, admin</h3>
    </a>

    <div class="dropdown">
      <select name="menu" class="btn btn-primary" id="menu" onchange="location.href = this.value;">
        <option value="">Menu</option>
        <option value="showall.php">Show all courier</option>
        <option value="add_courier.php">Add courier</option>
        <option value="update_pending.php">Pending/Update courier</option>
        <option value="delivered.php ">Delivered courier</option>
      </select>
    </div>
    <div class="logout">
      <button type="button" class="btn btn-dark"><a href="logout.php">Logout</a></button>
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>