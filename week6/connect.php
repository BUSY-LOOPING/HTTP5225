<?php
  $connect = mysqli_connect('localhost', 'dhruv', '1234', 'schools');
  
  if(!$connect){
    die("Connection Failed: " . mysqli_connect_error());
  }