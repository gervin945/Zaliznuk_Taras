<form method="POST" action="">
    <label>Ім’я:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" required><br><br>

    <label>Повідомлення:</label><br>
    <textarea name="message" required></textarea><br><br>

    <button type="submit" name="submit">Надіслати</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    $errors = [];

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Невірний формат email.";
    }

    
    if (strlen($message) < 20) {
        $errors[] = "Повідомлення повинно містити мінімум 20 символів.";
    }

    if (empty($errors)) {
        echo "<p>Повідомлення успішно надіслано!</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>

