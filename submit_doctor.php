<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");
if ($conn->connect_error) die("Connection failed");

// Create doctors table if not exists
$create = "CREATE TABLE IF NOT EXISTS doctors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  specialty VARCHAR(100),
  contact VARCHAR(20),
  added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($create);

// Insert data
$name = $_POST['name'];
$specialty = $_POST['specialty'];
$contact = $_POST['contact'];

$stmt = $conn->prepare("INSERT INTO doctors (name, specialty, contact) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $specialty, $contact);

if ($stmt->execute()) {
  echo "<h2>Doctor added successfully!</h2>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
