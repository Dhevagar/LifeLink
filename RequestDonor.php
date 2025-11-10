<?php
$conn = new mysqli('localhost', 'root', '', 'blood donation');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $requester_id = $_POST['requester_id'];
   $blood_type = $_POST['blood_type'];
   $healthcare_name = $_POST['healthcare_name'];
   $urgency_level = $_POST['urgency_level'];
   $status = $_POST['status'];

    $sql = "INSERT INTO request (requester_id, blood_type, healthcare_name, urgency_level, status)
            VALUES ('$req_id', '$bloodtype', '$hospital', '$urgency', '$stat')";
    
    if ($conn->query($sql)) {
        echo "<script>alert('Request sent!')</script>";
    } else {
        echo "Error inserting data!";
    }
}
$conn->close();
?>