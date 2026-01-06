<?php
include_once "./component/navbar.php";
include_once "./config.php";


if($_SERVER['REQUEST_METHOD'] === "POST"){
  if(isset($_POST['username'])){
    $username = $_POST['username'];
  }
  if(isset($_POST['email'])){
    $email = $_POST['email'];
  }
  if(isset($_POST['password'])){
    $password = $_POST['password'];
  }
  if(isset($_POST['re_type_password'])){
    $re_type_password = $_POST['re_type_password'];
  }
  if(isset($_POST['date_of_birth'])){
    $date_of_birth = $_POST['date_of_birth'];
  }

  $check_user_existence = "SELECT * FROM `users` WHERE username = '$username';";
  $check_user_existence_result = mysqli_query($conn, $check_user_existence);
  $row_count = mysqli_num_rows($check_user_existence_result);
  if($row_count >= 1){
    echo "<div class='alert alert-danger alert-dismissible fade show w-auto mx-auto rounded shadow' role='alert'>
           $username is already registered.
          <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
           </div>";
  }else{
    if($password == $re_type_password){
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $insert_data_query =  "INSERT INTO `users` (`username`, `email`, `password`, `birth_date`) VALUES ('$username', '$email', '$hashedPassword', '$date_of_birth');";
      $insert_data_query_result = mysqli_query($conn, $insert_data_query);
      if($insert_data_query_result){
           echo "<div class='alert alert-success alert-dismissible fade show w-auto mx-auto rounded shadow' role='alert'>
           Registered Successfully. Please login
          <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
           </div>";
      }
    }else{
          echo "<div class='alert alert-danger alert-dismissible fade show w-auto mx-auto rounded shadow' role='alert'>
           Password not matched.
          <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
           </div>";
    }
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
        <div class="text-center"><h2>SignUp</h2></div>
    <form action = "http://localhost/php-practice/login-app/sign-up.php" method="POST">
    <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name = "username" max="25" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name = "email" max="25" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name = "password" max="8" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Re-type Password</label>
    <input type="password" name = "re_type_password" max="8" class="form-control" id="exampleInputPassword1" placeholder="Re-type Password">
  </div>
  <div class="form-group mb-3">
  <label for="dateOfBirth" class="form-label">Date of Birth</label>
  <input type="date" name = "date_of_birth" class="form-control" id="dateOfBirth" name="dateOfBirth" max="2026-01-04">
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>