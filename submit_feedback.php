<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Save to a temp file
    file_put_contents("temp_feedback.txt", $message);

    // Run sentiment analysis Python script
    $sentiment = shell_exec("python analyze_feedback.py");

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message, sentiment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $message, $sentiment);
    $stmt->execute();

    echo "Feedback submitted! Sentiment: " . $sentiment;
}
?>
