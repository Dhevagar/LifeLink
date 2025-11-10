<?php
$conn = new mysqli('localhost', 'root', '', 'blood donation');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $req_id = $_POST['requester'];
    $bloodtype = $_POST['blood'];
    $hospital = $_POST['hospital_name'];
    $urgency = $_POST['urgency'];
    $stat = $_POST['state'];

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