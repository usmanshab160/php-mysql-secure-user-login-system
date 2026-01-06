<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usman Dev Identity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/php-practice/login-app/home-page.php">Usman Dev Identity</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "login"){
    echo "
        <li class='nav-item active'>
        <a class='nav-link' href='http://localhost/php-practice/login-app/sign-up.php'>SignUp</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='http://localhost/php-practice/login-app/login.php'>Login</a>
      </li>
  ";
}else{
  echo "
        <li class='nav-item'>
        <a class='nav-link' href='http://localhost/php-practice/login-app/logout.php'>Logout</a>
      </li>
  ";
}
  ?>

            </ul>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>