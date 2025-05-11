<?php
session_start();
include('connectdb.php');

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$success = "";
$errors = [];

// Jika form dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = mysqli_real_escape_string($db, $_POST['name']);
    $email   = mysqli_real_escape_string($db, $_POST['email']);
    $message = mysqli_real_escape_string($db, $_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        $errors[] = "Semua field harus diisi.";
    }

    if (count($errors) === 0) {
        $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
        if (mysqli_query($db, $sql)) {
            $success = "Pesan berhasil dikirim!";
        } else {
            $errors[] = "Gagal mengirim pesan: " . mysqli_error($db);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="icon" type="image/png" href="assets/logo.png" />
    <!-- FONT -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/contact.css" />
</head>

<body>
    <div class="contact-container">
        <h2>Contact Us</h2>
        <!-- Notifikasi -->
        <?php if (!empty($success)): ?>
            <div class="alert success">
                <?php echo "<script>alert('Pesan berhasil terkirim.');</script>"; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="alert error">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="contact.php" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name"
                value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly>

            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                value="<?php echo htmlspecialchars($_SESSION['email']); ?>" readonly>

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Your message" required></textarea>

            <button type="submit">Send Message</button>
            <a href="index.php" class="back-button">← Back</a>
        </form>
    </div>
</body>

</html>