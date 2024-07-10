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
          src="/public/Images/about-textbox.png"
          alt="Pixelated, white speech bubble for the cat saying 'About'."
        />
      </div>

      <div class="container">
        <div>
          <h2>The Website</h2>
          <p>Meow! Welcome to my website! Here, you can talk to other cats - just log in and click the Meowie button in the navbar!</p>
          <h2>The developer</h2>
          <p>
            My name is Katie - also known as kqtiiv. I am a computer science student, who enjoys web development, game development, 
            cryptography and theoroetical computing. My goal is to study CS at University and work in the sector in the future. 
            Evidently, I also like cats, and they would greatly appreciate any form of donation to aid in web hosting and game hosting.
          </p>
          <h2>I want more!</h2>
          <p>
            If you like this website, I'd be incredibly grateful if you checked out my other creations and social media (linked in the footer).
          </p>
          <h2>Meow appreciates you :)</h2>
          <p>
            Thank you for taking the time to read this with the most unreadable (but cute) font and have a have a meow-velous day!
          </p>
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
