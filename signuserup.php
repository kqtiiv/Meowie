<?php
require __DIR__ . "/vendor/autoload.php";

$env = parse_ini_file('.env');
$stripe_secret_key = $env["STRIPE_SECRET"];

$host = $env["HOST"];
$db = $env["DB_NAME"];
$sql_username = $env["SQL_USERNAME"];
$sql_password = $env["SQL_PASSWORD"];


$mysqli = new mysqli($host, $sql_username, $sql_password, $db, 3306);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$username = trim($_POST['username']);
$password = trim($_POST['password']);

if (empty($username) || empty($password)) {
    header('Location: login.php?err=USERNAME OR PASSWORD CANNOT BE EMPTY');
    exit;
}

if (preg_match("/[<|>]/", $username) || preg_match("/[<|>]/", $password)) {
    header('Location: login.php?err=DO NOT MESS WITH MEOWIE! I AM ALWAYS WATCHING!!!');
    exit;
}

if (strlen($username) > 50 || strlen($password) > 50) {
    header('Location: login.php?err=TOO MANY WORDS!!!');
    exit;
}

// Prevent SQL injection
$stmt = $mysqli->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // No user exists, start a transaction
    \Stripe\Stripe::setApiKey($stripe_secret_key);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $checkout_session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            "success_url" => "http://meowie.lovestoblog.com/success2.php?session_id={CHECKOUT_SESSION_ID}&username={$username}&password={$hashed_password}",
            "cancel_url" => "http://meowie.lovestoblog.com/login.php?err=TRANSACTION FAILED",
            "locale" => "auto",
            "line_items" => [
                [
                    "quantity" => 1,
                    "price_data" => [
                        "currency" => "gbp",
                        "unit_amount" => 100,
                        "product_data" => [
                            "name" => "post"
                        ]
                    ]
                ]      
            ]
        ]);
        
    header("Location: " . $checkout_session->url);
} else {
    // User already exists
    header('Location: login.php?err=USERNAME ALREADY IN USE');
    exit;
}

$stmt->close();
$mysqli->close();
?>
