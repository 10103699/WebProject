<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the POST data from the form
    $name = $_POST['name'];
    $description = $_POST['description'];
    $contact_info = $_POST['contact_info'];

    // Validate the data (e.g., make sure fields are not empty)
    if (empty($name) || empty($description) || empty($contact_info)) {
        echo "All fields are required.";
        exit;
    }

    // Setup the database connection (replace with your actual database details)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "oamogetswe_foundation";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO beneficiaries (name, description, contact_info) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $description, $contact_info);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to a success page (you can create a 'thank_you.html' page)
        header("Location: thank_you.html");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>