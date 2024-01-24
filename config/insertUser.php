<?php
include 'dbcon.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO user (username, password)
VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
  Header('Location: ../admin/index.php');
} else {

}

$conn->close();
?>