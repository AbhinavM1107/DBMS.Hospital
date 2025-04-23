<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");
$result = $conn->query("SELECT * FROM patients");

echo "<h2>Registered Patients</h2>";
echo "<table border='1' cellpadding='10'>
<tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Disease</th><th>Reg Date</th></tr>";

while ($row = $result->fetch_assoc()) {
  echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['age']}</td>
    <td>{$row['gender']}</td>
    <td>{$row['disease']}</td>
    <td>{$row['reg_date']}</td>
  </tr>";
}
echo "</table>";
$conn->close();
?>
