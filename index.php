<?php
session_start ();
if(isset ($_SESSION['user'])) {
  header (header: "Location: Welcome.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Muadz Portfolio</title>
  <link rel="stylesheet" href="style.css" />
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

</head>
<body>

  <header>
    <div class="logo">Muadz's Profile</div>
    <nav>
      <ul>
        <li><a href="#about">About Me</a></li>
        <li><a href="#education">Educational Background</a></li>
        <li><a href="#Project">Project</a></li>
        <li><a href="#contacts">Contacts</a></li>
        <li><a href="FormLogin.php">Log In</a></li>
       </ul>
    </nav>
  </header>

  <div class="container">
    <div class="left">
      <h1 id="typing-text"></h1>
      <p>I like to make pastry and sweet cake products with experienced user experiences.</p>
      <div class="details">
        <p>Baking enthusiast & student with a passion for science, nature and design.</p>
      </div>
    </div>
    <div class="right">
      <img src="Foto-2.jpg" alt="N/A" class="profile-img" />
    </div>
  </div>

  <section id="about">
    <h2>About Me</h2>
    <p>
      HI! <br>
      My name is Muadz Al Fateh.<br>
      I am a 11th grade student at SMK IT Ibnul Qayyim Makassar. <br>
      I am interested in making sweets, baking, watching movies or series. <br>
      I am also fascinated by scientific journals, human behaviour, and biology.
    </p>
  </section>

  <section id="education">
    <h2>Educational Record</h2>
    <p>
       TK IT Lukmanul Hakim || 2015-2016 <br> 
       SD IT Al-Ilmu || 2016-2018<br>
       Madrasah Ibtidaiyyah Abu Hurairah || 2018-2020<br>
       SMP IT Ibnul Qayyim || 2020-2023<br>
       RPL department of vocational school Ibnul Qayyim || 2024-Now <br>
       Join in an Extracurricular: Grafiqis || 2024-Now
    </p>
  </section>

  <section id="Project">
    <h2>Project</h2>
    <p>Distribute an effort in <a href="#">Ilmu Qayyim's website</a></p>
    <p>Active as participant in MarketDay: Selling Products</p>
  </section>

  <section id="contacts">
    <h2>Contacts</h2>
    <p>Reach me at <a target="_blank" href="mailto:muadzbelajar@gmail.com">muadzbelajar@gmail.com</a></p>
    <p>Send a message on <a target="_blank" href="https://wa.me/qr/7R7ZXN6IYWPFF1">WhatsApp</a></p>
    <p>Send a message on <a target="_blank" href="https://t.me/MuasMuis">Telegram</a> /MuasMuis</p>
  </section>

  <footer>
    <div class="footer-content">
      <ul class="footer-nav">
        <li><a href="#about">About Me</a></li>
        <li><a href="#education">Educational Background</a></li>
        <li><a href="#Project">Project</a></li>
        <li><a href="#contacts">Contacts</a></li>
      </ul>
    </div>
    <p class="copyright">&copy; 2025 All rights reserved.</p>
  </footer>

  <button id="backToTop" title="Back to top">⬆</button>

  <script src="script.js"></script>
</body>
</html>
