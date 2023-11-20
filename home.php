<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form inputs

    // Database connection details
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "eb";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    $username = $_POST['username'];
    $doorNo = $_POST['doorNo'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['states']; // Ensure this matches the name attribute in the HTML form
    $pincode = $_POST['pincode'];

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Inserting form data into the database
    $sql = "INSERT INTO house (User_Names, Door_No, street, city, states, pincode) 
            VALUES ('$username', '$doorNo', '$street', '$city', '$state', '$pincode')";

    if ($conn->query($sql) === TRUE) {
        header("Location: housebill.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
