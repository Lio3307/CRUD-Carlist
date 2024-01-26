<?php
require("connection.php");

if(isset($_POST["register"])){
  $user = strtolower($_POST["username"]);
  $pass = $_POST["pass"];


    mysqli_query($conect, "INSERT INTO formlogin VALUES ('$user', '$pass')");
    header("Location:login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>

<h5 style="text-align: center;" class="mt-5">Form Register</h5>
<div class="container d-flex justify-content-center mt-5">
<form method="post">
  <div class="mb-3 mt-5" >
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name="username" style="width: 400px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pass"  style="width: 400px;"  class="form-control" id="exampleInputPassword1">
    <div class="form-text">Sudah memiliki akun? <a href="login.php">Login    Disini</a> </div>
  </div>
  <button type="submit" class="btn btn-primary" value="Daftar" name="register">Daftar</button>
  </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>