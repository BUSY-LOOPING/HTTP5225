<?php
include 'connect.php';

$limit = 5; 
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
if ($page < 1)
    $page = 1;
$offset = ($page - 1) * $limit;

// Get total number of records
$total_sql = "SELECT COUNT(*) AS total FROM reviews";
$total_result = mysqli_query($connect, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Fetch paginated data
$sql = "SELECT * FROM reviews LIMIT $limit OFFSET $offset";
$result = mysqli_query($connect, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Reviews List with Pagination</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f9f9f9;
        }

        .review {
            background: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px #ccc;
            position: relative;
        }

        .rating {
            font-weight: bold;
            color: #007BFF;
        }

        .show-id,
        .review-id {
            font-style: italic;
            color: #555;
        }

        .edit-button {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #28a745;
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            margin: 0 4px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
        }

        .pagination span.disabled {
            background: #999;
            cursor: default;
        }

        .edit-button,
        .delete-button {
            position: absolute;
            top: 15px;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            color: white;
        }

        .edit-button {
            right: 80px;
            background-color: #28a745;
        }

        .delete-button {
            right: 15px;
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <h1>Reviews List</h1>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="review">
                <div class="rating">Rating: <?= htmlspecialchars($row['Rating']) ?></div>
                <p><?= htmlspecialchars($row['Review']) ?></p>
                <div class="show-id">Show ID: <?= htmlspecialchars($row['Show ID']) ?></div>
                <div class="review-id">Review ID: <?= htmlspecialchars($row['Review ID']) ?></div>
                <a class="edit-button" href="edit.php?id=<?= urlencode($row['Review ID']) ?>">Edit</a>
                <a class="delete-button" href="delete.php?id=<?= urlencode($row['Review ID']) ?>"
                    onclick="return confirm('Are you sure you want to delete this review?');">Delete</a>

            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>

    <!-- Pagination controls -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>">&laquo; Prev</a>
        <?php else: ?>
            <span class="disabled">&laquo; Prev</span>
        <?php endif; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?= $page + 1 ?>">Next &raquo;</a>
        <?php else: ?>
            <span class="disabled">Next &raquo;</span>
        <?php endif; ?>
    </div>

    <?php mysqli_close($connect); ?>
</body>

</html>