<?php include("db/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Coastwatchers Hotel</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
  <h1>Contact & Booking</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="about.html">About</a>
    <a href="rooms.php">Rooms</a>
    <a href="gallery.html">Gallery</a>
    <a href="contact.php">Contact</a>
  </nav>
</header>

<section>
  <h2>Book Your Stay</h2>
  <form method="POST" action="">
    <label>Name:</label>
    <input type="text" name="name" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Check-in:</label>
    <input type="date" name="checkin" required>
    <label>Check-out:</label>
    <input type="date" name="checkout" required>
    <label>Guests:</label>
    <input type="number" name="guests" required>
    <label>Room ID:</label>
    <input type="number" name="room_id" required>
    <button type="submit">Submit Booking</button>
  </form>
</section>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, checkin, checkout, guests, room_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $_POST['name'], $_POST['email'], $_POST['checkin'], $_POST['checkout'], $_POST['guests'], $_POST['room_id']);
    if ($stmt->execute()) {
        echo "<p>Booking successful! We will contact you soon.</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
?>

<footer>
  <p>&copy; 2026 Coastwatchers Hotel</p>
</footer>
</body>
</html>
