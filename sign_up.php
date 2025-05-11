<?php
session_start();
include('connectdb.php');

// Inisialisasi variabel
$errors = [];
$username = "";
$email = "";

// Proses registrasi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // Validasi form
  if (empty($username)) $errors[] = "Username is required";
  if (empty($email)) $errors[] = "Email is required";
  if (empty($password_1)) $errors[] = "Password is required";
  if ($password_1 != $password_2) $errors[] = "Passwords do not match";

  // Cek duplikat
  $query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if ($user['username'] === $username) $errors[] = "Username already exists";
    if ($user['email'] === $email) $errors[] = "Email already exists";
  }

  // Simpan user
  if (count($errors) == 0) {
    $password = md5($password_1);
    $query = "INSERT INTO user (username, email, password) VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    header('location: login.php');
    exit();
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gudang Skill - Sign Up</title>
  <link rel="icon" type="image/png" href="assets/logo.png">
  <!-- CSS -->
  <link rel="stylesheet" href="css/sign_up.css?v=<?php echo time(); ?>" />
  <!-- FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- HEADER -->
  <header>
    <div class="logo-container">
      <a href="index.php">
        <img src="assets/logo.png" width="50px" height="60px" alt="logo" />
        <h1>Gudang<span>skill</span></h1>
      </a>
    </div>

    <!-- NAVBAR -->
    <nav>
      <a href="index.php">Home</a>
      <a href="#">Contact</a>
    </nav>

    <div class="login-container">
      <a href="login.php" class="btn-login">Login</a>
      <div class="garis-vertical"></div>
      <a href="sign_up.php" class="btn-regis">Sign Up</a>
    </div>
  </header>
  <!-- HEADER END -->

  <div class="container-form">
    <form class="form" method="post" action="sign_up.php">
      <p class="form-title">Sign Up</p>

      <div class="input-container">
        <input type="text" name="username" placeholder="Enter Username" required value="<?php echo htmlspecialchars($username); ?>" />
        <input type="email" name="email" placeholder="Enter email" required value="<?php echo htmlspecialchars($email); ?>" />
        <input type="password" name="password_1" placeholder="Enter password" required />
        <input type="password" name="password_2" placeholder="Re-enter password" required />
      </div>

      <!-- Tampilkan error jika ada -->
      <?php if (count($errors) > 0): ?>
        <div class="error">
          <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
          <?php endforeach ?>
        </div>
      <?php endif ?>

      <!-- Tampilkan error jika ada end -->

      <button type="submit" name="reg_user" class="submit">SIGN UP</button>
    </form>
  </div>

</body>

</html>