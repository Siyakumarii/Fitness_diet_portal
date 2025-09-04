<?php
$sql = "INSERT INTO users (name, age, gender, height, weight, body_type, activity)
VALUES ('$name', '$age', '$gender', '$height', '$weight', '$body_type', '$activity')";
$conn->query($sql);
?>
