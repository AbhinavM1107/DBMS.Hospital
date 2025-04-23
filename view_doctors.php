<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");
$result = $conn->query("SELECT * FROM doctors");

echo "<h2>Doctor List</h2>";
echo "<table border='1' cellpadding='10'>
<tr><th>ID</th><th>Name</th><th>Specialty</th><th>Contact</th><th>Added</th></tr>";

while ($row = $result->fetch_assoc()) {
  echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['specialty']}</td>
    <td>{$row['contact']}</td>
    <td>{$row['added']}</td>
  </tr>";
}
echo "</table>";
$conn->close();
?>
