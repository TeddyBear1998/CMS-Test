<?php
session_start();

require_once("cms_helper.php");

echo "<a href='logout.php'>LOGOUT</a></br>";

if (!isset($_SESSION["logged_in"]) && $_SESSION['logged_in'] != TRUE){
  header("Location: /VendonTest/");
  die();
}

$cms = new Helper();
$cms_data = $cms->getData("SELECT * FROM quizzes");
$i = 1;



foreach ($cms_data as $data){
  echo $i . ". <a href='/VendonTest/private/edit.php?quiz={$data['id']}'>" . $data["quiz"] . "</a></br>";
  $i++;
}

?>
