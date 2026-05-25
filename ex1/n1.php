<?php
function isStrongPassword($password) {
    return strlen($password) >= 8 &&
           preg_match('/[A-Z]/', $password) &&
           preg_match('/[0-9]/', $password);
}

function generatePassword($length, $callback) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    do {
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[random_int(0, strlen($chars) - 1)];
        }
    } while (!$callback($password));
    return $password;
}

$passwords = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = max(1, (int)$_POST['count']);
    $length = max(1, (int)$_POST['length']);
    for ($i = 0; $i < $count; $i++) {
        $passwords[] = generatePassword($length, 'isStrongPassword');
    }
}

ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Passwords</title>
</head>
<body>

<form method="post">
<label>Кількість паролів:</label>
<input type="number" name="count" required>
<br>
<label>Довжина пароля:</label>
<input type="number" name="length" required>
<br>
<button type="submit">Згенерувати</button>
</form>

<ul>
<?php foreach ($passwords as $p): ?>
<li><?= htmlspecialchars($p) ?></li>
<?php endforeach; ?>
</ul>

</body>
</html>
<?php
echo ob_get_clean();
?>```
  

