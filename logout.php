<?php

setcookie('user_id', '', time() - 60, "/");
header('Location: login.php');
exit;

?>