<?php

     //Start session
     session_start();

     //redirect to food order home page
     define('SITEURL', 'http://localhost/food-order/');
     //Create Constants to store Non repeating values
     define('LOCALHOST', 'localhost');
     define('DB_USERNAME', 'root');
     define('DB_PASSWORD', '');
     define('DB_NAME', 'food-order');

      //3. Execute Query and save data in database 
     $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database connectin
     $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Select db

?>