<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $connect = mysqli_connect("localhost","root","","csv_db 15");

        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM colors";
        $colors = mysqli_query($connect, $query);
        // echo print_r($colors, true);
        if ($colors) {
            foreach ($colors as $color) {
                // echo print_r($color, true);
                echo "<div style='background-color: {$color['Hex']}; width: 90%; height: 50px; margin: 10px; text-align: center;'>{$color['Name']}</div>";
            }
        }
    ?>
</body>
</html>