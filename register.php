<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

    setcookie("email", $email, time() + (7 * 24 * 60 * 60), "/");

    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Реєстрація</title>
</head>
<body>

<h2>Реєстрація</h2>

<form method="post">
    <label>Ім'я:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Пароль:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Зареєструватися</button>
</form>

</body>
</html>
