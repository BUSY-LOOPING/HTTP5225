<?php
include 'connect.php'; 

$sql = "SELECT * FROM reviews";  
$result = mysqli_query($connect, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($connect));
}

echo "<h2>Reviews List</h2>";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Rating: " . $row['Rating'] . "<br>";
        echo "Review: " . $row['Review'] . "<br>";
        echo "Show ID: " . $row['Show ID'] . "<br>";
        echo "Review ID: " . $row['Review ID Primary'] . "<br>";
        echo "<hr>"; 
    }
} else {
    echo "No records found.";
}

mysqli_close($connect);
?>
