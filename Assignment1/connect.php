<?php
  $connect = mysqli_connect('localhost', 'root', '', 'imdb');
  
  if(!$connect){
    die("Connection Failed: " . mysqli_connect_error());
  }