<?php
SESSION_START();
include 'dbcon.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '$username' && password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
 if (strpos($username, '@admin')) {
   $_SESSION['status'] = 1;
    Header("Location: ../admin/index.php");
 } else if (strpos($username, '@student')) {
    Header("Location: ../student/index.php");
 }
} else {
   $_SESSION['status'] = 2;
   $_SESSION['error'] = "INVALID USERNAME OR PASSWORD";
   Header("Location: ../index.php");
}
$conn->close();
?>