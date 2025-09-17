<?php
include('db.php');

$name = $_POST['name'];
$blood_type = $_POST['blood_type'];
$location = $_POST['location'];
$contact = $_POST['contact'];

$sql = "INSERT INTO donors (name, blood_type, location, contact)
        VALUES ('$name', '$blood_type', '$location', '$contact')";

if (mysqli_query($conn, $sql)) {
    echo "<h2>Registration Successful!</h2>";
    echo "<a href='index.html'>Go Back</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
