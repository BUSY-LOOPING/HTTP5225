<?php
include('connect.php');

if (isset($_POST['login'])) {
    $query = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "' AND password = '" . md5($_POST['password']) . "'";


    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        // User exists, redirect to dashboard or home page
        $record = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $record['id'];
        $_SESSION['name'] = $record['name'];

        header('Location: index.php');
        die();
    } else {
        // Invalid credentials, show error message
        header('Location: login.php');
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form action="login.php" method="post">
        <label for="">Email</label>
        <input type="text" name="email">
        <br>
        <label for="">Password</label>
        <input type="password" name="password"><br>
        <input type="submit" name="login">
    </form>
</body>

</html>