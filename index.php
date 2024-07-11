<?php
    // Start output buffering to prevent issues with header()
    ob_start();

    if (!isset($_COOKIE['user_id'])) {
      header("Location: /login.php");
      exit;
    }

$env = parse_ini_file('.env');
$host = $env["HOST"];
$db = $env["DB_NAME"];
$sql_username = $env["SQL_USERNAME"];
$sql_password = $env["SQL_PASSWORD"];


    $mysqli = new mysqli($host, $sql_username, $sql_password, $db, 3306);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $meow = $mysqli->query("SELECT users.username, posts.createdAt, posts.content FROM posts JOIN users ON posts.user_id = users.id");
    if (!$meow) {
        die("Query failed: " . $mysqli->error);
    }

    // End output buffering
    ob_end_flush();
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meowie</title>
    <link href="/public/style.css" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/public-pixel" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <a href="/" id="logo">Meowie</a>
      <nav class="navbar">
        <a href="/about.php">About</a>
        <a href="/contact.php">Contact</a>
      </nav>
      <div id="menu-icon" onclick="toggleMenu()">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="25"
          height="25"
          fill="currentColor"
          class="bi bi-list"
          viewBox="0 0 16 16"
        >
          <path
            fill-rule="evenodd"
            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"
          />
        </svg>
      </div>
    </header>
    <main>
      <div id="cat-container">
        <img
          id="cat-1"
          src="/public/Images/cat-sit-1.png"
          alt="Pixelated, ginger, sitting cat"
        />
        <img
          id="cat-speech"
          src="/public/Images/cat-textbox.png"
          alt="Pixelated, white speech bubble for the cat saying 'Meow! Find posts below!'."
        />
      </div>
      <div class="container">
        <div id="write">
          <h1>Write</h1>
          <form action="/createpost.php" method="POST">
            <textarea
              rows="10"
              type="text"
              name="content"
              placeholder="Text"
            ></textarea>
            <input class="btn" type="submit" value="Post - £1" />
          </form>
          <span>
            <?php 
              if (isset($_GET['error'])) {
                 echo htmlspecialchars($_GET['error']);
              }
              if (isset($_GET['res'])) {
                  echo htmlspecialchars($_GET['res']);
              } 
            ?>
          </span>
        </div>
        <div id="feed">
          <h1>Feed</h1>
          <ul class="post-ul">
            <?php
              while ($post = $meow->fetch_assoc()) {
            ?>
                <div class="post-card">
                  <p class="content"><?php echo htmlspecialchars($post["content"]); ?></p>
                  <p class="details"><?php echo htmlspecialchars($post["username"]); ?> @ <?php echo htmlspecialchars($post["createdAt"]); ?></p>
                </div>
            <?php
              }
            ?>
          </ul>
        </div>
        <form action="/logout.php" >
            <input class="btn" type="submit" value="Logout" />
        </form>
      </div>
    </main>
    <footer>
      <div class="footer">
        <img src="/public/Images/cat_3.png" alt="ginger cat face" />
        <p>Meow. Nothing to see here.</p>
      </div>
      <div id="copyright-container">
        <p id="copyright-txt">Copyright © 2024 kqtiiv</p>
      </div>
    </footer>
  </body>
  <script>
    function toggleMenu() {
        const navbar = document.querySelector('.navbar');
        navbar.style.display = navbar.style.display === 'flex' ? 'none' : 'flex';
    }
  </script>
</html>
