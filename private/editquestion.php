<?php

session_start();

require_once("cms_helper.php");

if (!isset($_SESSION["logged_in"]) && $_SESSION['logged_in'] != TRUE){
  header("Location: /VendonTest/");
  die();
}

$helper = new Helper();
if (isset($_GET['question'])){
  $questionData = $helper->getQuestion($_GET['question']);
}else{
  header("Location: /VendonTest/private/edit.php");
  die();
}

echo "<form name='edit_question' method='POST' action='save_question.php' >";
echo "Question</br>";
echo "<input name='question' type='text' required value='{$questionData['question']}' />";
$answers = explode(" | ", $questionData['answers']);
echo "</br>Answers </br>";
foreach ($answers as $ans) {
  echo "<input name='answer{$ans}' type='text' value={$ans} /></br>";
}
// TODO: If have time change this to a select.
echo "Correct Answer </br>";
echo "<input name='correct_ans' type='text' value='{$questionData['correct_answer']}' />";
echo "<input name='qid' type='hidden' value='{$questionData['id']}' />";
echo "<input name='submit' type='submit' value='submit' />";
echo "</form>";

// TODO: Could add input field for new answer addition. 

?>
