<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form.css">

    </style>
</head>

<body>
    <div class="navbar">
        <ul>
            <<li><a href="index.html" class="home">Home</a></li>
            <li><a href="doctors.html">Doctors</a></li>
            <li><a href="appointment.html">Appointments</a></li>
            <li><a href="contact.html" class="contact">Contact</a></li>
            <li><a href="admin.html" class="admin">Admin log-in</a></li>
        </ul>
    </div>

    <br>

    <form name="apform" id="apform" method="post" onclick="credentialchec()">

        <h2 class="fhead">Enter Credentials</h2>
        <br>
        <table>
            <tr>
                <td><label>Admin Number : </label></td>
                <td><input type="number" name="ad_no" id="ad_no" placeholder="Admin Number" required></td>
            </tr>
            <tr>
                <td><label>Username : </label></td>
                <td><input type="text" name="username" id="username" placeholder="Username" required></td>
            </tr>
            <tr>
                <td><label>Password : </label></td>
                <td><input type="password" name="password" id="password" placeholder="Password" required></td>
            </tr>
        </table>
        <br>
        <input type="submit" class="submit">
        <input type="reset" class="reset">
<br>
    </form>

</body>

</html>
<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "appointment");

// Create a connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adNumber = $_POST['ad_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $validUsernameQuery = "SELECT Username FROM admin_credentials WHERE Ad_Number = $adNumber";
    $validUsernameResult = $conn->query($validUsernameQuery);
    $validUsernameRow = $validUsernameResult->fetch_assoc();
    $validUsername = $validUsernameRow['Username'];

    $validPasswordQuery = "SELECT Password FROM admin_credentials WHERE Username = '$username'";
    $validPasswordResult = $conn->query($validPasswordQuery);
    $validPasswordRow = $validPasswordResult->fetch_assoc();
    $validPassword = $validPasswordRow['Password'];

    if ($username === $validUsername && $password === $validPassword) {
        // Redirect to Afteradminlogin.html
        header("Location: Afteradminlogin.html");
        exit;
    }
}
$conn->close();
?>
