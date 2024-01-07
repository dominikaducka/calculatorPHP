<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Document</title>
</head>

<body>
<main>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <label for="num1">First number:</label>
    <input type="number" name="num1" placeholder="First number">
    
    <label for="num2">Second number:</label>
    <input type="number" name="num2" placeholder="Second number" label="Second number:">
    
    <label for="operation">Operation?</label>
        <select id="operation" name="operation">
          <option value="add">+</option>
          <option value="subtract">-</option>
          <option value="multiply">*</option>
          <option value="divide">/</option>
          </select>

        <button type="submit">Calculate</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
      
    // GRAB DATA FROM INPUTS
      $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
      $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
      $operator = htmlspecialchars($_POST["operation"]);
    

      // ERROR HANDLERS
      $errors = false;

      if (empty($num1) || empty($num2) || empty($operator)) {
        echo "<p class='calc-error'> Fill in all data!</p>";
        $errors = true;
      };

      if (!is_numeric($num1) || !is_numeric($num2)) {
        echo "<p class='calc-error'> Use only numbers!</p>";
        $errors = true;
      }

      //CALCULATE THE NUMBERS IF NO ERRORS

      if (!$errors) {
        $value = 0;
        switch ($operator) {
          case "add":
            $value = $num1 + $num2;
            break;
          case "subtract":
            $value = $num1 - $num2;
            break;
          case "multiply":
            $value = $num1 * $num2;
            break;
          case "divide":
            $value = $num1 / $num2;
            break;
          default:
            echo "<p class='calc-error'> Something went wrong.</p>";
        }

        echo "<p class='calc-result'>Result = " .
        $value . "</p>";
      }
    
  }  
  ?>

</main>
</body>
      
</html>