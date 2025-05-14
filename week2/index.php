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
</body>
</html>