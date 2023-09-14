<?php
$username = 'root';
$password = '';
$database_name = '30square';

$conn = new mysqli($username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // You should also consider sanitizing and validating the data before insertion
}
?>
<?php
$sql = "INSERT INTO contact (name, email, phone, message) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $phone, $message);

if ($stmt->execute()) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

