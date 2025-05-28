<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- echo -->
    <?php
        echo "<h1>Hello World</h1>";

        echo "<p>
                My name is dhruv.
              </p>";
    ?>
    <!-- variables -->
    <?php
        $fname = 'dhruv';
        $lname = 'yadav';
        echo "<h1>Hello $fname (inline)</h1>";
        echo "<h1>Hello " . $fname . " (second way)</h1>";
    ?>
    <!-- arrays -->
     <?php
     $people = array(
        'john',
        'alex',
        'bill'
     );
     ?>

     <?php
     $hour = date('G');
     $hour = rand(1, 23);
     $greeting = 'Good Evening!';
     if ($hour < 12) {
        $greeting = 'Good Morning!';
     }elseif($hour < 19) {
        $greeting = 'Good Afternoon!';
     }
     echo "<p>$greeting</p>";
     ?>

    
</body>
</html>