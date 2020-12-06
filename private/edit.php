<?php

session_start();

require_once("cms_helper.php");

if (!isset($_SESSION["logged_in"]) && $_SESSION['logged_in'] != TRUE){
  header("Location: /VendonTest/");
  die();
}

$helper = new Helper();
if (isset($_GET['quiz'])){
  $questionData = $helper->getData("SELECT * FROM questions WHERE quiz_id = {$_GET['quiz']}");
}else{
  header("Location: /VendonTest/private/cms.php");
  die();
}
$i = 1;
foreach($questionData as $data){
  echo $i . ". <a href='/VendonTest/private/editquestion.php?question={$data['id']}'>" . $data['question'] . "</a>";
  $i++;
}
// TODO: Could add field to input another question for this quiz.

?>
