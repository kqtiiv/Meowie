<?php
$mysqli = new mysqli("localhost", "root", "root", "meow", 3306);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

// Prevent SQL injection
$stmt = $mysqli->prepare("SELECT id, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// if user doesn't exist show error
if ($result->num_rows == 0) {
    header('Location: login.php?error=DOES NOT EXIST');
    exit;
} else {
    // if password is wrong, show error
    $user = $result->fetch_assoc();

    if (!password_verify($password, $user["password"])) {
        header('Location: login.php?error=WRONG USERNAME OR PASSWORD');
        exit;
    } else {
        // Redirect to index.php and set a cookie!
        setcookie('user_id', $user['id'], time() + (86400), "/");
        header('Location: /index.php');
        exit;
    }
}

$stmt->close();
$mysqli->close();
?>
