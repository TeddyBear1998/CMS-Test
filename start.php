<?php
session_start();

require_once('quiz.php');

// TODO: Implement a solution using AJAX for dynamically loading questions.

// TODO: From quiz_id, get all of the questions and all of their columns... This will give us the id of question.
// From there call a function to display a question with a given id.

//// ...................................

// TODO: Store name, quiz id, correct answers count.

// TODO: Count correct answers.

// TODO: check for the usual suspects... VALIDATE DATA and so on.. if have the time.

$quiz = new Quiz();
$all_qs = $quiz->getQuiz($_POST['quiz']);

// TODO: dynamically call function that gives just 1 question to the display and then, when answered process with ajax, get next question.
foreach($all_qs as $question){
  echo "<h1>{$question['question']}</h1>";
  $answers = explode(" | ", $question['answers']);
  foreach($answers as $answer){
    echo "<input type='radio' id='{$answer}' name='answer' value='{$answer}' />";
    echo "<label for='{$answer}'>{$answer}</label></br>";
  }
  echo "<button id='next_btn'> NEXT </button>";
}

?>

<html>
  <script>
    $(document).ready(function(){
      $("#next_btn").click(function(){
        $.ajax({
          // TODO: Call some function to enter the data into db.
          // TODO: Get next question....
        });
      });
    });
  </script>
</html>
