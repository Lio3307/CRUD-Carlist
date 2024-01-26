<?php
session_start();
require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

<h5 style="text-align: center;" class="mt-5">Login Form</h5>
<div class="container d-flex justify-content-center mt-5">
<form method="post">
  <div class="mb-3 mt-5" >
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name="username" style="width: 400px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pass"  style="width: 400px;"  class="form-control" id="exampleInputPassword1">
    <div class="form-text">Tidak memiliki akun? <a href="register.php">Klik Disini</a> </div>
  </div>
  <button type="submit" name="send" class="btn btn-primary">Submit</button>
  </div>

  <?php
        if (isset($_POST['send'])) {
            $user = $_POST['username'];
            $pass = $_POST['pass'];

            $query = mysqli_query($conect, "SELECT * FROM formlogin WHERE user='$user' AND pass = '$pass'");
            $countdata = mysqli_num_rows($query);
            $data = mysqli_fetch_array($query);

            if ($countdata > 0) {
                if ($pass == $data['pass']) {
                    $_SESSION['nama'] = $data['user'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['login'] = true;
                    $_SESSION['pass'] = $data['pass'];
                    header('location:user.php');

                } if ($user == $data['username']) {
                    $_SESSION['admin'] = $data['user'];
                    $_SESSION['admin'] = $data['username'];
                    $_SESSION['login'] = true;
                    $_SESSION['admin123'] = $data['pass'];
                    header('location:index.php');
                }else {
                    ?>
                    <div class="alert alert-danger" role="alert">Password Username Salah!</div>
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-danger" role="alert">Data yang kamu masukan Salah!</div>
                <?php
            }
        }
        ?>
</form>
  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>