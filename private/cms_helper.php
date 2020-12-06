<?php

require_once("db_connection.php");

class Helper {

  public function getData($query){
      $conn = new DB();
      $connection = $conn->connect();

      // TODO: make sure 0 records exception gets handled properly.
      if($stmt = $connection->prepare($query)){
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $stmt->close();
      }
      $conn->disconnect($connection);
      return $data;
  }

  // TODO: Make sure that a record exists, if not throw error message
  public function getQuestion($id){
    $conn = new DB();
    $connection = $conn->connect();

    $query = "SELECT * FROM questions WHERE id = ? LIMIT 1";
    if($stmt = $connection->prepare($query)){
      $stmt->bind_param("s", $id);
      $stmt->execute();
      $stmt->bind_result($qid, $qquestion, $qanswers, $qcorrect_answer, $quiz_id);
      $stmt->fetch();
      $stmt->close();
    }
      return ["id" => $qid, "question" => $qquestion, "answers" => $qanswers, "correct_answer" => $qcorrect_answer, "quiz_id" => $quiz_id];
  }

  // TODO: Make sure this executes without errors with any data provided.
  public function saveData($data){
    $conn = new DB();
    $connection = $conn->connect();
    $query = "UPDATE questions SET question=?, answers=?, correct_answer=? WHERE id = ?";
    if($stmt = $connection->prepare($query)){
      $stmt->bind_param("sssi", $data['question'], $data['all_answers'], $data['correct_ans'], $data['qid']);
      $stmt->execute();
      $stmt->close();
    }
    return true;
  }

}


?>
