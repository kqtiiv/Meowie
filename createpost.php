<?php
    require __DIR__ . "/vendor/autoload.php";

    $env = parse_ini_file('.env');
    $stripe_secret_key = $env["STRIPE_SECRET"];

    $cookie = $_COOKIE['user_id'];
    $content = $_POST['content'];

    if (!$content) {
        header('Location: /index.php?error=MESSAGE CANNOT BE BLANK!');
        exit;    
    } 
    \Stripe\Stripe::setApiKey($stripe_secret_key);

    $checkout_session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            "success_url" => "http://meowie.lovestoblog.com/success.php?session_id={CHECKOUT_SESSION_ID}&content={$content}",
            "cancel_url" => "http://meowie.lovestoblog.com/index.php?error=TRANSACTION FAILED",
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

?>