<?php
require __DIR__ . "/vendor/autoload.php";

$env = parse_ini_file('.env');
$stripe_secret_key = $env["STRIPE_SECRET"];

\Stripe\Stripe::setApiKey($stripe_secret_key);

$session_id = $_GET['session_id'];
$session = \Stripe\Checkout\Session::retrieve($session_id);

if ($session->payment_status == 'paid') {
    $cookie = $_COOKIE['user_id'];
    $content = $_GET['content'];

    $mysqli = new mysqli("localhost", "root", "root", "meow", 3306);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Avoid SQL injection
    $stmt = $mysqli->prepare("INSERT INTO posts (user_id, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $cookie, $content);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();

    header("Location: /index.php?res=SUCCESS");
} else {
    header("Location: /index.php?error=TRANSACTION FAILED");
}
exit;
?>