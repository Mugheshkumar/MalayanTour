<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $merchantName = htmlspecialchars($_POST["merchantName"]);
    $contactNumber = htmlspecialchars($_POST["contactNumber"]);
    $email = htmlspecialchars($_POST["email"]);
    $companyDescription = htmlspecialchars($_POST["companyDescription"]);


    $uploadDirectory = "uploads/"; // directory fr file uploads


    if(isset($_FILES["documents"])) {
        $uploadedFile = $uploadDirectory . basename($_FILES["documents"]["name"]);
        move_uploaded_file($_FILES["documents"]["tmp_name"], $uploadedFile);
    }

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "malayantour";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO merchants (merchantName, contactNumber, email, companyDescription, documentPath)
            VALUES ('$merchantName', '$contactNumber', '$email', '$companyDescription', '$uploadedFile')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>