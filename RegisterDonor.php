
<?php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli('localhost', 'root', '', 'blood donation');
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed."]);
    exit;
}

// Get and sanitize POST data
$name = $_POST['full_name'] ?? '';
$blood = $_POST['blood_type'] ?? '';
$address = $_POST['address'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';

// Insert data
$sql = "INSERT INTO donor (full_name, blood_type, address, phone, email) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $blood, $address, $phone, $email);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "We will notify you when your blood type matched"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>