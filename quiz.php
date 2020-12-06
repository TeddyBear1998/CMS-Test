<?php

require_once("private/db_connection.php");
require_once('private/cms_helper.php');

class Quiz{

  public function getQuiz($id){
    $helper = new Helper();
    $data = $helper->getData("SELECT * FROM questions WHERE quiz_id = {$id}");
    return $data;
  }

}

?>
