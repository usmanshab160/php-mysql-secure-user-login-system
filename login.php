<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once "./component/navbar.php";
include_once "./config.php";


if($_SERVER['REQUEST_METHOD'] === "POST"){
  if(isset($_POST['username'])){
    $username = $_POST['username'];
  }
  if(isset($_POST['password'])){
    $password = $_POST['password'];
  }



  $check_user_existence = "SELECT * FROM `users` WHERE username = '$username';";
  $check_user_existence_result = mysqli_query($conn, $check_user_existence);
  $row_count = mysqli_num_rows($check_user_existence_result);
  if($row_count == 1){
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $row = mysqli_fetch_assoc($check_user_existence_result);
    $password_verification = password_verify($password, $row['password']);
    if($password_verification){
        $_SESSION["status"] = "login";
        $_SESSION["username"] = "$username";
            header("Location: http://localhost/php-practice/login-app/home-page.php");
            exit;
    }else{
           echo "<div class='alert alert-danger alert-dismissible fade show w-auto mx-auto rounded shadow' role='alert'>
           Password not match.
          <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
           </div>";
    }
  }else{
           echo "<div class='alert alert-danger alert-dismissible fade show w-auto mx-auto rounded shadow' role='alert'>
           $username not exist in Usman Dev Identity System. Please create the account.
          <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
           </div>";
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="text-center"><h2>SignIn</h2></div>
    <form action = "http://localhost/php-practice/login-app/login.php" method="POST">
    <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name = "username" max="25" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name = "password" max="8" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>