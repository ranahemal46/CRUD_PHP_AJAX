<?php
require 'config.php';

ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

if(isset($_POST["action"])){
  if($_POST["action"] == "insert"){
    insert();
  }
  else if($_POST["action"] == "edit"){
    edit();
  }
  else{
    delete();
  }
}

function insert(){
  global $conn;

  $name = $_POST["name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];

  $query = "INSERT INTO `users` (`name`, `email`,`gender`) VALUES ('$name', '$email','$gender')";

  echo $query;


  mysqli_query($conn, $query);
  echo "Inserted Successfully";
}

function edit(){
  global $conn;

  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];

  $query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `gender` = '$gender' WHERE `id` = '$id' ";
  mysqli_query($conn, $query);
  echo "Updated Successfully";
}

function delete(){
  global $conn;

  $id = $_POST["action"];

  $query = "DELETE FROM `users` WHERE id = $id";
  mysqli_query($conn, $query);
  echo "Deleted Successfully";
}