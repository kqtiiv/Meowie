<?php

    $mysqli = new mysqli("localhost", "root", "root", "meow", 3306);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $result = $mysqli->query("SELECT id, password FROM users WHERE username = '$username'");

    // if user doesn't exist show error
    if ($result->num_rows == 0) {
        header('Location: login.php?error=DOES NOT EXIST');
    } else {
        echo "Does exist";
        // if password is wrong, show error
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"]) == FALSE) {
            header('Location: login.php?error=WRONG USERNAME OR PASSWORD');
        } else {
            // Redirect to index.php and set a cookie!
            setcookie('user_id', $user['id'], time() + (86400), "/");
            header('Location: /index.php');
        }
    }

?>