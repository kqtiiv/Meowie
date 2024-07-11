<?php

require __DIR__ . "/vendor/autoload.php";

$env = parse_ini_file('.env');
$stripe_secret_key = $env["STRIPE_SECRET"];

$host = $env["HOST"];
$db = $env["DB_NAME"];
$sql_username = $env["SQL_USERNAME"];
$sql_password = $env["SQL_PASSWORD"];


\Stripe\Stripe::setApiKey($stripe_secret_key);

$session_id = $_GET['session_id'];
$session = \Stripe\Checkout\Session::retrieve($session_id);

if ($session->payment_status == 'paid') {
    $username = $_GET["username"];
    $hashed_password = $_GET["password"];

    $mysqli = new mysqli($host, $sql_username, $sql_password, $db, 3306);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $insert_stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if (!$insert_stmt) {
        header("Location: /login.php?err=DATABASE ERROR");
        exit;
    }
    $insert_stmt->bind_param("ss", $username, $hashed_password);
    $insert_stmt->execute();

    if ($insert_stmt->affected_rows === 0) {
        header("Location: /login.php?err=FAILED TO CREATE USER");
        exit;
    }

    // Retrieve the newly created user's ID
    $new_result = $mysqli->prepare("SELECT id FROM users WHERE username = ?");
    if (!$new_result) {
        header("Location: /login.php?err=DATABASE ERROR");
        exit;
    }
    $new_result->bind_param("s", $username);
    $new_result->execute();
    $new_user = $new_result->get_result()->fetch_assoc();

    if (!$new_user) {
        header("Location: /login.php?err=FAILED TO RETRIEVE USER");
        exit;
    }

    // Set the user ID cookie and redirect
    setcookie('user_id', $new_user['id'], time() + (86400), "/");
    header('Location: /index.php');
    exit;
} else {
    header("Location: /login.php?err=TRANSACTION FAILED");
    exit;
}

?>
