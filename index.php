<!DOCTYPE html>
<?php session_start(); ?>
<?php
  require_once("private/db_connection.php");
  require_once("private/cms_helper.php");
 ?>
<html>
<head>
  <?php require("public/header.php") ?>
</head>
<body>
  <?php
    $db = new DB();
    $connection = $db->connect();
    $helper = new Helper();
    $quizzes = $helper->getData("SELECT * FROM quizzes");
  ?>
  <a href="login.php">Log into CMS</a>
  <h1>Testa uzdevums</h1>
  <form name="test" method="POST" action="start.php">
    <input name="name" type="text" placeholder="Enter your name" required />
    <select name="quiz" id="quiz" required>
      <option selected="true" disabled>Select a quiz</option>
      <?php
        foreach($quizzes as $quiz){
          echo "<option value='{$quiz['id']}'>{$quiz['quiz']}</option>";
        }
      ?>
    </select>
    <input type="submit" name="submit" value="submit" />
  </form>
</body>
</html>
