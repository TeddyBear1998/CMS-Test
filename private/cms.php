<?php
session_start();

require_once("cms_helper.php");

$baseUrl = "localhost";

if (!isset($_SESSION["logged_in"]) && $_SESSION['logged_in'] != TRUE){
  header("Location: {$baseUrl}/VendonTest/");
  die();
}

$cms = new Helper();
$cms_data = $cms->getData();
$i = 0;
foreach ($cms_data as $data){
  echo $i . ". <a href='/VendonTest/private/edit.php?question={$data['id']}'>" . $data["question"] . "</a></br>";
  $i++;
}

?>
