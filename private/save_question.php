<?php

session_start();

require_once("cms_helper.php");

if (!isset($_SESSION["logged_in"]) && $_SESSION['logged_in'] != TRUE){
  header("Location: /VendonTest/");
  die();
}

$data = $_POST;
$data['all_answers'] = "";
foreach($data as $key => $value){
  if (substr($key, 0, 6) == "answer"){
    $data['all_answers'] .= $value . " | ";
  }
}
$data['all_answers'] = rtrim($data['all_answers'], ' | ');

$helper = new Helper();
$helper->saveData($data);
