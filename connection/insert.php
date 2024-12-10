<?php
include '../connection/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from POST request
    $user_id = $_POST['user_id']; // Assuming user_id is sent in POST
    $tracking_num = $_POST['tracking_num']; // Assuming tracking_num is sent in POST
    
    // Insert data into the qr table
    $sql = "INSERT INTO qr (user_id, tracking_num) VALUES (:user_id, :tracking_num)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':tracking_num', $tracking_num);
    
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Failed to insert data.";
    }
}
?>

<form method="POST">
    <label for="user_id">User ID:</label>
    <input type="text" name="user_id" id="user_id" required><br>

    <label for="tracking_num">Tracking Number:</label>
    <input type="text" name="tracking_num" id="tracking_num" required><br>

    <input type="submit" value="Submit">
</form>
