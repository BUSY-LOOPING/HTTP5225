<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Welcome to the Quirky Zoo Management System!</h2>
    <?php
    $current_time = rand(1, 23);
    echo "<h3>Current Time Variable - $current_time</h3>";

    if ($current_time > 5 && $current_time < 9) {
        echo "<p> The animals should be fed Bananas, Apples and Oats </p>";
    } elseif ($current_time > 12 && $current_time < 14) {
        echo "<p> The animals should be fed Fish, Chicken, and Vegetables </p>";
    } elseif ($current_time > 19 && $current_time < 21) {
        echo "<p> The animals should be fed Steak, Carrots, and Broccoli </p>";
    } else {
        echo "<p> The animals are not being fed right now. </p>";
    }
    ?>

    <h2>Welcome to the Magic Number Game!</h2>
    <form method="GET">
        <label for="number-input">Enter Number</label>
        <input id="number-input" type="number" name="number-input" placeholder="Enter the number">
        <button type="submit">Check</button>
    </form>

    <?php
    //checking if input is valid
    if (isset($_GET['number-input'])) {
        $numberInput = $_GET['number-input'] ?? 0;
        if (!is_numeric($numberInput)) {
            echo "<span style='color: red;'>Please enter a valid number.</span>";
        }elseif ($numberInput % 15 == 0) {
            echo "<p id='magic-number'>FizzBuzz</p>";
        }elseif($numberInput % 3 == 0) {
            echo "<p id='magic-number'>Fizz</p>";
        } elseif ($numberInput % 5 == 0) {
            echo "<p id='magic-number'>Buzz</p>";
        } else {
            echo "<p id='magic-number'>The magic number is $numberInput</p>";
        }
    }
    ?>
</body>

</html>