<?php include("db/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Rooms & Rates - Coastwatchers Hotel</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
  <h1>Rooms & Rates</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="about.html">About</a>
    <a href="rooms.php">Rooms</a>
    <a href="gallery.html">Gallery</a>
    <a href="contact.php">Contact</a>
  </nav>
</header>

<section>
  <h2>Our Rooms</h2>
  <?php
  $sql = "SELECT * FROM rooms";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo "<div class='room'>";
          echo "<img src='images/" . $row['image'] . "' alt='" . $row['name'] . "'>";
          echo "<h3>" . $row['name'] . "</h3>";
          echo "<p>" . $row['description'] . "</p>";
          echo "<p><strong>PGK " . $row['price'] . " per night</strong></p>";
          echo "</div>";
      }
  } else {
      echo "No rooms available.";
  }
  ?>
</section>

<footer>
  <p>&copy; 2026 Coastwatchers Hotel</p>
</footer>
</body>
</html>
