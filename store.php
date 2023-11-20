<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form inputs
    $username = $_POST['username'];
    $consumer = $_POST['Consumer']; // Corrected to 'Consumer' to match the input name

    // Database connection details
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "eb";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Inserting form data into the database
    $sql = "INSERT INTO eb (username, consumer) VALUES ('$username', '$consumer')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to ebbill.html after storing data
        header("Location: ebbill.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
