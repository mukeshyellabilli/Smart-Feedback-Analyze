<?php
include 'db_config.php';

$result = mysqli_query($conn, "SELECT * FROM feedback ORDER BY id DESC");
echo "<h2>Feedback List</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Sentiment</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['message']}</td>
            <td>{$row['sentiment']}</td>
          </tr>";
}
echo "</table>";
?>
