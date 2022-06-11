<?php 

require_once "db_connect.php";

session_start();
error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if(isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $conpassword = $_POST['conpassword'];

  if($password == $conpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if(!$result->num_rows>0) {
      $sql = "INSERT INTO `users` (`username`, `password`, `email`) VALUES ('$username', '$password', '$email');";
      $result = mysqli_query($conn, $sql);
      if($result) {
        echo "<div class='alert alert-success' role='alert'>
        Your account has been created! You can login now.
      </div>";
      }
      else {
        echo "<div class='alert alert-success' role='alert'>
        Your account has been created! You can login now.
      </div>";
      }
    }
    else {
      echo "<div class='alert alert-secondary' role='alert'>
      This e-mail already exists!
    </div>";
    }  
  }
  else {
    echo "<div class='alert alert-primary' role='alert'>
    Passwords did not match!
  </div>";
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
  <title>Darcel</title>
</head>
<body>
<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10" style="margin-top: -22px">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="../Images/courier chan.jpg"
                alt="sign-up form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"/>
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="" method="POST">
                  <div class="form-outline mb-4">
                    <input type="text" id="username" name="username" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example17">Username</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" id="copassword" name="conpassword" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example27">Confirm Password</label>
                  </div>
                  <div class="pt-1 mb-4">
                    <button class="btn btn-outline-dark btn-lg btn-block" type="submit" name="submit">Sign up</button>
                  </div>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="http://localhost/darcel/userPanel/login.php" style="color: #393f81;">Login here</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>