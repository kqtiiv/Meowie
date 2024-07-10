<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meowie</title>
    <link href="/public/style.css" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/public-pixel" rel="stylesheet" />
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
      <div id="menu-icon">
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
          src="/public/Images/contact-textbox.png"
          alt="Pixelated, white speech bubble for the cat saying 'Contact'."
        />
      </div>

      <div class="container">
        <div id="write">
          <h1>Write</h1>
          <form action="/contactresponse.php" method="POST">
            <textarea
              rows="15"
              type="text"
              name="content"
              placeholder="Text"
            ></textarea>
            <input class="btn" type="submit" value="Submit" />
          </form>
          <span id="error"><?php echo $_GET['res']; ?></span>
        </div>
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
</html>
