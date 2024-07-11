<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meowie</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" >
    <link href="/public/style.css" rel="stylesheet" />
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
        <div class="err-container">
            <h1 id="err-sign">Error :(</h1>
            <img id="black-cat" src="/public/Images/cat_1.png" alt="black cat face" />
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
