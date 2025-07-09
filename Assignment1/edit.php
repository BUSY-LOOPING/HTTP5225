<?php
require('connect.php');

// Fetch review to edit
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];
  $query = "SELECT * FROM reviews WHERE `Review ID` = '$id'";
  $result = mysqli_query($connect, $query);
  $review = mysqli_fetch_assoc($result);
}

// Update review
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $rating = $_POST['rating'];
  $text = $_POST['review'];

  $query = "UPDATE reviews 
            SET `Rating` = '$rating', 
                `Review` = '$text' 
            WHERE `Review ID` = '$id'";
  $result = mysqli_query($connect, $query);

  if ($result) {
    header('Location: index.php');
    exit;
  } else {
    echo "Update failed: " . mysqli_error($connect);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Review</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f6f6f6;
      padding: 40px;
    }

    h1 {
      color: #333;
      margin-bottom: 20px;
    }

    form {
      background-color: white;
      padding: 25px;
      max-width: 600px;
      margin: auto;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      font-weight: bold;
      margin-top: 15px;
      margin-bottom: 5px;
    }

    input[type="number"],
    textarea {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    textarea {
      resize: vertical;
    }

    input[type="submit"] {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #007BFF;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      color: #007BFF;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <h1>Edit Review</h1>

  <form action="edit.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $review['Review ID']; ?>">

    <label>Rating:</label>
    <input type="number" name="rating" value="<?php echo $review['Rating']; ?>" min="0" max="10" required>

    <label>Review:</label>
    <textarea name="review" rows="8" required><?php echo $review['Review']; ?></textarea>

    <input type="submit" value="Update Review">
  </form>

  <a class="back-link" href="index.php">← Back to Reviews List</a>

</body>
</html>
