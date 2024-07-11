<?php

    if (isset($_COOKIE['user_id'])) {
      header("Location: /index.php");
      exit;
    }

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meowie</title>
    <link href="/public/style.css" rel="stylesheet" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" >
    <link href="https://fonts.cdnfonts.com/css/public-pixel" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class="small-screen-icons">
        <a href="/" id="logo">Meowie</a>
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
      </div>
      <div class="navbar">
        <a class="about" href="/about.php">About</a>
        <a class="contact" href="/contact.php">Contact</a>
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
          src="/public/Images/login-textbox.png"
          alt="Pixelated, white speech bubble for the cat saying 'Login'."
        />
      </div>

      <div class="big-container">
        <div class="container">
            <h1>Log In</h1>
            <form action="/loguserin.php" method="POST">
            <h2>Username</h2>
              <input
                rows="1"
                type="text"
                name="username"
                placeholder="meow"
              ></input>
            <h2>Password</h2>
              <input
                rows="1"
                type="password"
                name="password"
                placeholder="meow"
              ></input>
              <input class="btn" type="submit" value="Login" />
            </form>
            <span><?php echo htmlspecialchars($_GET['error']); ?></span>
        </div>
        <div class="container">
            <h1>No Account? Sign Up!</h1>
            <form action="/signuserup.php" method="POST">
            <h2>Username</h2>
              <input
                rows="1"
                type="text"
                name="username"
                placeholder="meow"
              ></input>
            <h2>Password</h2>
              <input
                rows="1"
                type="password"
                name="password"
                placeholder="meow"
              ></input>
              <input class="btn" type="submit" value="Sign Up - £1" />
            </form>
            <span><?php echo htmlspecialchars($_GET['err']); ?></span>
        </div>
      </div>
    </main>
    <footer>
      <div class="footer">
        <img src="/public/Images/cat_3.png" alt="ginger cat face" />
        <p>Meow. Nothing to see here.</p>
      </div>
      <div id="copyright-container">
        <p id="copyright-txt">Copyright © <?php echo date("Y") ?> kqtiiv</p>
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
