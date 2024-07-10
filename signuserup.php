<?php

    $mysqli = new mysqli("localhost", "root", "root", "meow", 3306);

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $result = $mysqli->query("SELECT id FROM users WHERE username = '$username'");

    // if user doesn't exist create account
    if ($result->num_rows == 0) {
        if (empty($username) || empty($password)) {
            header('Location: login.php?err=USERNAME OR PASSWORD CANNOT BE EMPTY');
        } else {
            if ((preg_match("/([<|>])/", $username)) || (preg_match("/([<|>])/", $password))) {
                header('Location: login.php?err=DO NOT MESS WITH MEOWIE! I AM ALWAYS WATCHING!!!');
            } else {
                if (strlen($username) > 50 || strlen($password) > 50) {
                    header('Location: login.php?err=TOO MANY WORDS!!!');
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $query = $mysqli->query("INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')");
                    // Redirect to index.php and set a cookie!
                    $new_result = $mysqli->query("SELECT id FROM users WHERE username = '$username'");
                    $user = $new_result->fetch_assoc();

                    setcookie('user_id', $user['id'], time() + (86400), "/");
                    header('Location: /index.php');
                }
            }
        }
    } else {
        // error if user exists
        header('Location: login.php?err=USERNAME ALREADY IN USE');
    }

?>