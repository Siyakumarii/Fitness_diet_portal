<?php
$conn = new mysqli("localhost", "root", "", "fitness_db");
if ($conn->connect_error) die("Connection failed");

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users_auth (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
echo "<script>alert('Registration successful'); window.location='login.html';</script>";
?>
