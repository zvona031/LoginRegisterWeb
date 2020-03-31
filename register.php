<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "user123";
$db = "users";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];

    $check_sql = "SELECT * FROM usersList WHERE userName='$userName'";
    $response = $conn->query($check_sql);
    if($response->num_rows != 0){
        exit("Username already exists!");
    }

    $sql = "INSERT INTO usersList (userName, userPassword, firstName, lastName, age) VALUES('$userName','$password','$firstName','$lastName','$age') ";
    $conn->query($sql);
    header('Location: login.html');
}
