<?php
    $content = $_POST['content'];

    if ($content == "meow") {
        header('Location: contact.php?res=MEOW');
    } else {
        header("Location: contact.php?res=THANK YOU FOR YOUR MESSAGE. MEOWIE UNFORTUNATELY ONLY UNDERSTANDS MEOW.");
    }

?>