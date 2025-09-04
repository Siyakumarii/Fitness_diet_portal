<?php
session_start();
$conn = new mysqli("localhost", "root", "", "fitness_db");
if ($conn->connect_error) die("Connection failed");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users_auth WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
  $_SESSION['username'] = $username;
  header("Location: ../index.html");
} else {
  echo "<script>alert('Login failed'); window.location='login.html';</script>";
}
?>
