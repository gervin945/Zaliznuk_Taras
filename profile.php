<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: register.php");
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];

$cookieEmail = isset($_COOKIE['email']) ? $_COOKIE['email'] : "немає даних";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Профіль</title>
</head>
<body>

<h2>Профіль користувача</h2>

<p><strong>Ім'я:</strong> <?php echo htmlspecialchars($name); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>

<p>Ваш email запам'ятали: <?php echo htmlspecialchars($cookieEmail); ?></p>

<a href="logout.php">
    <button>Вийти</button>
</a>

</body>
</html>
