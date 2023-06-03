<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMW 330i</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
</head>
<body>
    <header>
        <img src="Components/AlchemistCars.PNG" alt="Company Logo" id="logo">
        <nav>
          <ul>
            <li><a href="main.php">Home</a></li>
            <li><a href="parts.php">Parts</a></li>
            <li><a href="sellcars.php">Sell Your Car</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="leasing.php">Leasing</a></li>
            <?php
            if(isset($_SESSION['username'])) {
                // User is signed in
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                // User is not signed in
                echo '<li><a href="signin.php">Sign In</a></li>';
            }
            ?>
          </ul>
        </nav>
      </header>
      <main>
        <section>
          <h1>BMW 330i</h1>
         <div class="boxed-text">
          <p>Looking for a dynamic and luxurious ride? Look no further than this stunning BMW 330i from 2002! This sleek and stylish sedan boasts a powerful 3.0-liter inline six-cylinder engine that delivers smooth and responsive performance, making it a joy to drive in any situation.</p>
          <p>Step inside and you'll be greeted by a spacious and comfortable interior, complete with premium leather seats, high-quality materials, and a host of advanced features that make every journey a pleasure. With its advanced audio system, climate control, and power accessories, you'll feel right at home behind the wheel of this impressive vehicle.</p>
          <p>But it's not just about comfort and convenience - the BMW 330i also offers exceptional handling and precision, thanks to its advanced suspension system, responsive steering, and powerful brakes. Whether you're cruising down the highway or taking on tight curves, this car delivers a smooth and engaging driving experience that is second to none.</p>
          <p>So if you're looking for a car that combines style, performance, and luxury, look no further than this stunning BMW 330i from 2002. With its impressive features and exceptional performance, it's sure to turn heads and provide an unforgettable driving experience. Don't miss out on this opportunity come see it for yourself today!</p>
        </div>
        </section>
        <div>
          <img src="Components/bmwe46.jpg" class="car-image" alt="BMW 330i 2002">
        </div>
        <button class="price-button">€5000</button>
        <?php
        if(isset($_SESSION['username'])) {
            // User is signed in
            echo '<button class="rent"><a href="rent.php">Rent</a></button>';
        } else {
            // User is not signed in
            echo '<p>If you want to rent this car, please <a href="signin.php">sign in</a> or <a href="signup.php">sign up</a>.</p>';
        }
        ?>
      </main>
</body>
</html>
