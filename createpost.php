<?php

    $mysqli = new mysqli("localhost", "root", "root", "meow", 3306);
    $query = $mysqli->query("INSERT INTO posts (user_id, content) VALUES ('" . $_COOKIE['user_id'] . "', '" . $_POST['content'] . "')");

    header('Location: /index.php');

?>