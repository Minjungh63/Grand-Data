<!DOCTYPE html>
<style>
  #list_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
  }
  #delete{
    width: 120px;
    height: 40px;
    font-size: small;
    padding: 5px;
    border-radius: 10px;
    font-weight: 700;
    background-color: #000;
    color:#ffffff;
    margin: auto;
    display: block;
  }
  .list_tr{
    font-size:18px; 
    font-weight:700; 
    height:70px;
  }
  .normal_tr{
    height:40px; 
    font-weight:700;
  }
</style>
<html>
    <head>
    <meta charset="UTF-8">
    <title>WhatMakesAMovieSuccessful</title>
    <link rel="stylesheet" href="Main.css">
    </head>

    <body>
        
      <div id="updeco">
        <a href="menu.html">Film Culture Industry Analysis: What makes a movie successful</a>
      </div>

      
    <nav role="navigation">
      <ul id="main-menu">
        <li><a href="../menu/Main1.html">main1</a></li>
        <li><a href="../menu/Main2.html">main1</a></li>
        <li><a href="../menu/Main3.html">main3</a></li>
        <li><a href="../menu/Main4.html">main4</a></li>
        <li><a href="../menu/Main5.html">main5</a></li>
        <li><a href="../menu/Main6.html">main6</a></li>
        <li><a href="../menu/Main7.php">main7</a></li>
        <li><a href="../menu/feedback.php">Feedback</a></li>
      </ul>
    </nav>

    <section>
        
    <p>

    <div id = "contents">
    <h2 id = "title">Theater</h2>

      <?php
      $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');

      if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
      } else {
        if (!empty($_REQUEST['checkbox'])) {
          mysqli_begin_transaction($mysqli);
          try {
            foreach ($_REQUEST['checkbox'] as $id) {
              $sql = 'DELETE FROM Theater WHERE theater_id = ?';
              if ($stmt = mysqli_prepare($mysqli, $sql)) {
                mysqli_stmt_bind_param($stmt, 'i', $theater_id);
                $theater_id = $id;
                mysqli_stmt_execute($stmt);
              } else {
                echo "ERROR: Could not prepare query: $sql. " . mysqli_error($mysqli);
              }
            }
            mysqli_commit($mysqli);
            echo 'Deletion Successful.';
          } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($mysqli);
            throw $exception;
          }
          mysqli_close($mysqli);
        } else {
          echo 'No item is selected.';
        }
      }
      ?>

</div>
  </p>
</section>
<div id="downdeco">
    Copyright &copy; GRAND_DATA_2022_All Rights Reserved. 
</div>
</body >

</html> 