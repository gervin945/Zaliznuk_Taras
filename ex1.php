$name = "";
$age = "";
$gender = "";
$about = "";
$hobbies = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(trim($_POST["name"] ?? ""));
    $age = trim($_POST["age"] ?? "");
    $gender = htmlspecialchars($_POST["gender"] ?? "");
    $about = htmlspecialchars(trim($_POST["about"] ?? ""));
    $hobbies = $_POST["hobbies"] ?? [];

    if ($name == "") {
        $errors[] = "Введіть ім’я";
    }

    if (!is_numeric($age) || $age < 10 || $age > 100) {
        $errors[] = "Вік має бути числом від 10 до 100";
    }

    if ($gender == "") {
        $errors[] = "Оберіть стать";
    }

    if (empty($errors)) {
        echo "<h3>Успішно!</h3>";
        echo "Ім’я: $name <br>";
        echo "Вік: $age <br>";
        echo "Стать: $gender <br>";
        echo "Хобі: " . implode(", ", $hobbies) . "<br>";
        echo "Про себе: $about";
        exit;
    }
}
?>

<form method="post">
    Ім’я: 
    <input type="text" name="name" value="<?= $name ?>"><br><br>

    Вік: 
    <input type="text" name="age" value="<?= $age ?>"><br><br>

    Стать:
    <input type="radio" name="gender" value="Чоловік" <?= ($gender=="Чоловік")?"checked":"" ?>> Чоловік
    <input type="radio" name="gender" value="Жінка" <?= ($gender=="Жінка")?"checked":"" ?>> Жінка
    <br><br>

    Хобі:
    <input type="checkbox" name="hobbies[]" value="Спорт" <?= in_array("Спорт", $hobbies) ? "checked" : "" ?>> Спорт
    <input type="checkbox" name="hobbies[]" value="Музика" <?= in_array("Музика", $hobbies) ? "checked" : "" ?>> Музика
    <input type="checkbox" name="hobbies[]" value="ІТ" <?= in_array("ІТ", $hobbies) ? "checked" : "" ?>> IT
    <input type="checkbox" name="hobbies[]" value="Подорож" <?= in_array("Подорож", $hobbies) ? "checked" : "" ?>> Подорож
    <input type="checkbox" name="hobbies[]" value="Кулінарія" <?= in_array("Кулінарія", $hobbies) ? "checked" : "" ?>> Кулінарія
    <input type="checkbox" name="hobbies[]" value="Малювання" <?= in_array("Малювання", $hobbies) ? "checked" : "" ?>> Малювання
    <br><br>

    Про себе:<br>
    <textarea name="about"><?= $about ?></textarea><br><br>

    <button type="submit">Відправити</button>
</form>

<?php
if (!empty($errors)) {
    echo "<ul style='color:red;'>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul>";
}
?>
