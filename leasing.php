<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Lease a Car</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
  </head>
  <body>
  <header>
  <img src="Components/AlchemistCars.PNG" alt="Company Logo" id="logo">
  <nav>
    <ul>
      <li><a href="main.php">Home</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php
      if(isset($_SESSION['username'])) {
          if($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'user') {
              echo '<li><a href="parts.php">Parts</a></li>';
              echo '<li><a href="sellcars.php">Sell Your Car</a></li>';
              echo '<li><a href="leasing.php">Leasing</a></li>';
          }
          if($_SESSION['role'] === 'admin') {
              echo '<li><a href="admin_dashboard.php">Admin Dashboard</a></li>';
          }
          echo '<li><a href="logout.php">Logout</a></li>';
          echo '<li><a href="account.php">Account</a></li>';
      } else {
          echo '<li><a href="signin.php">Sign In</a></li>';
      }
      ?>
    </ul>
  </nav>
</header>
      <section id="leasing">
  <div class="container">
    <h1>Leasing Options</h1>
    
    <form class="leasing-form" id="leasing-form" method="post">
      <label for="make">Make:</label>
      <select id="make" name="make">
        <option value="">Select Make</option>
        <option value="mercedesbenz">Mercedes-Benz</option>
        <option value="bmw">BMW</option>
        <option value="audi">Audi</option>
        <option value="Volvo">Volvo</option>
        <option value="Mazda">Mazda</option>s
      </select>
      
      <label for="model">Model:</label>
      <select id="model" name="model">
        <option value="">Select Model</option>
        <!-- options for Mercedes-Benz models -->
        <optgroup label="Mercedes-Benz">
          <option value="e200">E200</option>
          <option value="e63">E63</option>
        </optgroup>
        <!-- options for BMW models -->
        <optgroup label="BMW">
          <option value="3.series">3.series</option>
        </optgroup>
        <!-- options for Audi models -->
        <optgroup label="Audi">
          <option value="a6">A6</option>
        </optgroup>
        <!-- options for Mazda models -->
        <optgroup label="Mazda">
          <option value="mx5">MX5</option>
        </optgroup>
        <!-- options for Volvo models -->
        <optgroup label="Volvo">
          <option value="s60r">S60R</option>
        </optgroup>
      </select>

      <label for="year">Year:</label>
      <select id="year" name="year">
        <option value="">Select Year</option>
        <option value="1993">1993</option>
        <option value="1994">1994</option>
        <option value="2002">2002</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
      </select>
      
      <label for="lease-term">Lease Term:</label>
      <select id="lease-term" name="lease-term">
        <option value="">Select Lease Term</option>
        <option value="12">12 Months</option>
        <option value="24">24 Months</option>
        <option value="36">36 Months</option>
        <option value="48">48 Months</option>
        <option value="60">60 Months</option>
      </select>
      
      <button class="filterButton type="submit" name="submit">Submit</button>
    </form>
  </div>
</section>
<?php

// Check if the form is submitted
if (isset($_POST['submit'])) {

  require_once('db_credentials.php');

  // Get the form data
  $make = $_POST['make'];
  $model = $_POST['model'];
  $year = $_POST['year'];
  $lease_term = $_POST['lease-term'];

  // Prepare and execute the SQL statement to insert the data into the database table
  $stmt = $conn->prepare("INSERT INTO leasing (make, model, year, lease_term) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $make, $model, $year, $lease_term);
  $stmt->execute();

  // Close the database connection
  $stmt->close();
  $conn->close();

  exit();
}
?>
  </body>
  <style>
    /* Leasing page form */
.leasing-form{
  width: 400px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
}
/* Styling for form labels */
label {
  display: block;
  margin-bottom: 5px;
}

/* Styling for form inputs */
input[type=text], input[type=number], select {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
}

/* Styling for form submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.container h1{
  font-size: 25px;
  margin-bottom: 20px;
  text-align: center;
}
  </style>
</html>