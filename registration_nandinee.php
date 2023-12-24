<?php
$servername = "localhost";
$Email = "root";
$password = ""; // Use your MySQL password here
$dbname = "blood_donation_login_registration";

// Create a connection
$conn = new mysqli($servername, $Email, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$input_Email = $_POST['Email'];
$input_password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

// SQL query to insert new user
$sql = "INSERT INTO donors(Email, password) VALUES ('$input_Email', '$input_password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registration successsful!')</script>";
    echo "<script>window.open('main.html','_self')</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Close the connection
$conn->close();


echo '<script>
        document.getElementById("Email").value = "";
        document.getElementById("password").value = "";
       
      </script>';

?>
