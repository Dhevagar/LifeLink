<?php
$conn = new mysqli('localhost', 'root', '', 'blood donation');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $bloodtype = $_POST['blood_type'];
    $hospital = $_POST['healthcare_name'];
    $name = $_POST['name'];

    $sql = "INSERT INTO requests (blood_type, healthcare_name, name)
            VALUES ('$bloodtype', '$hospital', '$name')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Request sent!'); window.location.href='FindADonor.php';</script>";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

$conn->close();
?>