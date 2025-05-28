<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Week4-Loops</h1>
    <?php
    // Function to fetch user data from the JSONPlaceholder API
    function getUsers()
    {
        $url = "https://jsonplaceholder.typicode.com/users";
        $data = file_get_contents($url);
        return json_decode($data, true);
    }
    // Get the list of users
    $users = getUsers();
    foreach ($users as $user) {
        echo "<p>Name = $user[name]</p>";
        echo "<p>Id = $user[id]</p>";
        echo "<p>Username = $user[username]</p>";
        $address = $user['address'];
        $addressString = $address['street'] . ', ' . $address['suite'] . ', ' . $address['city'] . ', ' . $address['zipcode'];
        echo "<p>Address = $addressString</p>";
        echo "<p>Phone = $user[phone]</p>";
        echo "<p>Website = $user[website]</p>";
        $company = $user['company'];
        $companyString = $company['name'] . ', "' . $company['catchPhrase'] . '", ' . $company['bs'];
        echo "<p>Company = $companyString</p>";
        echo "<br>";
    }
    ?>
</body>

</html>