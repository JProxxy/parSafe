<?php
include '../connection/db.php';

// Get data from the qr table
$sql = "SELECT * FROM qr";
$stmt = $pdo->query($sql);

echo "<h2>QR Data</h2>";
echo "<table border='1'>";
echo "<tr><th>QR ID</th><th>User ID</th><th>Tracking Number</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>" . $row['qr_id'] . "</td><td>" . $row['user_id'] . "</td><td>" . $row['tracking_num'] . "</td></tr>";
}

echo "</table>";
?>
