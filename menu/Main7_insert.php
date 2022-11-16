<!DOCTYPE html>
<style>
  #list_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
  }
  #insert{
    width: 180px;
    height: 40px;
    font-size: medium;
    padding: 5px;
    border-radius: 10px;
    font-weight: 700;
    background-color: #000;
    color:#ffffff;
    margin-top:5px;
		margin-bottom:5px
  }
  .list_tr{
    font-size:20px; 
    font-weight:700; 
    height:70px; 
    cursor:pointer;
  }
  .normal_tr{
    height:40px; 
    font-weight:700;
    cursor:pointer;
  }
  .input_box{
    width:180px;
    height:20px;
    font-size:12px;
    margin-left:3px;
		margin-right:3px;
		margin-top:3px;
		margin-bottom:3px
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
  <li><a href="../menu/Main1.html">Distributor</a></li>
  <li><a href="../menu/Main2.html">Genre</a></li>
  <li><a href="../menu/Main3.html">Release Date</a></li>
  <li><a href="../menu/Main4.html">Country</a></li>
  <li><a href="../menu/Main5.html">Director</a></li>
  <li><a href="../menu/Main6.html">Film Festival</a></li>
  <li><a href="../menu/Main7.php">Theater</a></li>
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
        mysqli_begin_transaction($mysqli);
        try {
          $sql1 =
            'INSERT INTO Theater(theater_name, branch, hall_num, seat_num) values(?, ?, ?, ?)';
          if ($stmt1 = mysqli_prepare($mysqli, $sql1)) {
            mysqli_stmt_bind_param($stmt1, 'ssii', $theater_name, $branch, $hall_num, $seat_num);
            $theater_name = $_REQUEST['theater_name'];
            $branch = $_REQUEST['branch'];
            $hall_num = $_REQUEST['hall_num'];
            $seat_num = $_REQUEST['seat_num'];
            mysqli_stmt_execute($stmt1);

            $sql2 = 'SELECT MAX(theater_id) AS theater_id FROM Theater';
            $res2 = mysqli_query($mysqli, $sql2);
            $res2Array = mysqli_fetch_array($res2, MYSQLI_ASSOC);

            $sql3 = 'INSERT INTO Theater_Address(theater_id, city, district) values(?, ?, ?)';
            if ($stmt2 = mysqli_prepare($mysqli, $sql3)) {
              mysqli_stmt_bind_param($stmt2, 'iss', $theater_id, $city, $district);
              $theater_id = $res2Array['theater_id'];
              $city = $_REQUEST['city'];
              $district = $_REQUEST['district'];
              mysqli_stmt_execute($stmt2);
            }
          }
          mysqli_commit($mysqli);
          mysqli_free_result($res2);
          echo 'Insertion Successful.';
        } catch (mysqli_sql_exception $exception) {
          mysqli_rollback($mysqli);
          throw $exception;
        }
        mysqli_close($mysqli);
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