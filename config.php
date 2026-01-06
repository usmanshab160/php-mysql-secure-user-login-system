<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "usman-dev-identity";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "<div class='alert alert-success alert-dismissible fade show w-auto mx-auto rounded shadow' role='alert'>
  Database connected successfully
  <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
</div>
";
?>