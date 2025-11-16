<!DOCTYPE html>
<html>
<head>
  <title>Contact</title>
  <link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body>
  <h1>Contact Us</h1>
  <nav>
    <a href="index.php">Home</a> |
    <a href="students.php">Student Management</a> |
    <a href="about.php">About</a> |
    <a href="contact.php">Contact</a>
  </nav>
  <form name="contactForm" onsubmit="return validateForm()">
    <input type="text" name="name" placeholder="Your Name">
    <input type="text" name="email" placeholder="Your Email">
    <textarea name="message" placeholder="Your Message"></textarea>
    <button type="submit">Send</button>
  </form>
</body>
</html>