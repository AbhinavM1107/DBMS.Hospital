<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
  // echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->select_db($dbname);

// Create patients table
$table = "CREATE TABLE IF NOT EXISTS patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  age INT,
  gender VARCHAR(10),
  disease VARCHAR(100),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($table);

// Insert form data
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$disease = $_POST['disease'];

$stmt = $conn->prepare("INSERT INTO patients (name, age, gender, disease) VALUES (?, ?, ?, ?)");
$stmt->bind_param("siss", $name, $age, $gender, $disease);
if ($stmt->execute()) {
  echo "<h2>Patient registered successfully!</h2>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
