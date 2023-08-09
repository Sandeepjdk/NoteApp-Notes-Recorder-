<?php
          error_reporting(0);

      session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
              header('location: index.php');
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>About Section</title>
</head>
 <style>
     body{
         background: url('img/bg.jpg');
         background-size:cover;
     }
 </style>
<body>

<section class=" py-5 bg-light">
  <div class="container container">
    <div class="row align-items-center">
      <!-- Image column -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="position-relative" style="width: 250px; height: 250px;">
          <img src="img/myself.jpeg" class="img-fluid rounded-circle" alt="Profile Image" style="object-fit: cover; width: 100%; height: 100%;">
          <div class="position-absolute top-0 start-0 bg-primary" style="width: 30px; height: 30px; border-radius: 50%;"></div>
        </div>
      </div>
      
      <!-- Text column -->
      <div class="col-lg-6">
        <div class="card shadow p-4">
          <h2 class="mb-4">About Me</h2>
          <p>"Hi, I'm Sandeep, a passionate MCA student at Lovely Professional University. During my journey, I had the incredible opportunity to grow and learn through a rewarding 3-month internship at NSL Technology. I am driven by my curiosity for technology and my desire to make a positive impact in the world through innovative solutions. I believe in continuous learning and strive to excel in every challenge that comes my way. Let's explore and create together!"</p>


          <p>I am driven by my curiosity for technology and my desire to make a positive impact in the world through innovative solutions. I believe in continuous learning and strive to excel in every challenge that comes my way. Let's explore and create together!</p>
          <!-- <a href="#" class="btn btn-primary">Learn More</a> -->
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
