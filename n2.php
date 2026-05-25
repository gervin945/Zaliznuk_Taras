$users = [
    ["name" => "Roman", "age" => 17, "email" => "roman@gmail.com"],
    ["name" => "Sania", "age" => 22, "email" => "sania@gmail.com"],
    ["name" => "Mark", "age" => 19, "email" => "mark@gmail.com"],
    ["name" => "Oskar", "age" => 16, "email" => "oskar@gmail.com"],
    ["name" => "Tarasik", "age" => 25, "email" => "tarasik@gmail.com"],
    ["name" => "Sofia", "age" => 18, "email" => "sofia@gmail.com"],
    ["name" => "Dmytro", "age" => 35, "email" => "dmytro@gmail.com"],
    ["name" => "Olga", "age" => 19, "email" => "olga@gmail.com"],
    ["name" => "Kateryna", "age" => 11, "email" => "katya@gmail.com"],
    ["name" => "Polina", "age" => 22, "email" => "polina@gmail.com"],
];

function filterAdults($user) {
    return $user["age"] >= 18;
}

$adults = array_filter($users, "filterAdults");

function compareByNameLength($a, $b) {
    return strlen($a["name"]) - strlen($b["name"]);
}

usort($adults, "compareByNameLength");

echo "<table border='1'>";
echo "<tr><th>Name</th><th>Age</th><th>Email</th></tr>";

foreach ($adults as $user) {
    echo "<tr>";
    echo "<td>{$user['name']}</td>";
    echo "<td>{$user['age']}</td>";
    echo "<td>{$user['email']}</td>";
    echo "</tr>";
}

echo "</table>";
?>

