<?php
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$body_type = $_POST['body_type'];
$activity = $_POST['activity'];

$bmi = $weight / (($height / 100) ** 2);

include("php/connect.php");
include("php/save_user.php");

$calories = 0;
if ($gender == "Male") {
    $calories = 10 * $weight + 6.25 * $height - 5 * $age + 5;
} else {
    $calories = 10 * $weight + 6.25 * $height - 5 * $age - 161;
}
switch ($activity) {
  case "Low": $calories *= 1.2; break;
  case "Moderate": $calories *= 1.55; break;
  case "High": $calories *= 1.9; break;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Result</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h2>Hello, <?php echo $name; ?>!</h2>
    <p>Your BMI is: <?php echo round($bmi, 2); ?></p>
    <p>Recommended Daily Calories: <?php echo round($calories); ?> kcal</p>

    <h3>Diet Plan (Indian)</h3>
    <ul>
      <li>🌅 Morning: Warm water + Lemon, Idli or Upma</li>
      <li>🍱 Lunch: Chapati, Dal, Veg curry, Curd</li>
      <li>🥗 Dinner: Light Khichdi or Veg soup</li>
    </ul>
<div class='meal-images'>
<img src='images/food_breakfast.jpg' alt='Breakfast'>
<img src='images/food_lunch.jpg' alt='Lunch'>
<img src='images/veg_curry.jpg' alt='Curry'>
<img src='images/food_dinner.jpg' alt='Dinner'>
</div>

    <h3>Yoga Tips (Body Type: <?php echo $body_type; ?>)</h3>
    <ul>
      <?php
      if ($body_type == "Ectomorph") {
        echo "<li>Surya Namaskar</li><li>Bhujangasana</li>";
      } elseif ($body_type == "Mesomorph") {
        echo "<li>Trikonasana</li><li>Navasana</li>";
      } else {
        echo "<li>Utkatasana</li><li>Setu Bandhasana</li>";
      }
      ?>
    </ul>
<div class='meal-images'>
<img src='images/food_breakfast.jpg' alt='Breakfast'>
<img src='images/food_lunch.jpg' alt='Lunch'>
<img src='images/veg_curry.jpg' alt='Curry'>
<img src='images/food_dinner.jpg' alt='Dinner'>
</div>
    <img src="images/yoga.jpg" width="100%">
  </div>
</body>
</html>
