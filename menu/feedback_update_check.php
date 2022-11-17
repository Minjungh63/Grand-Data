<?php
session_start(); ?>
<!DOCTYPE html>
<style>
  #confirm{
    width: 60px;
    height: 30px;
    font-size: small;
    padding: 5px;
    border-radius: 10px;
    font-weight: 700;
    background-color: #f3e5ab;
    border-color: #ffffff;
    color:#000;
    margin: auto;
  }
  #rk_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
  }
  .rk_tr{
    font-size:20px; 
    font-weight:700; 
    height:70px; 
    color:orange;
    cursor:pointer;
  }
  .rk_tr:hover{
    font-size:20px; 
    font-weight:700; 
    height:70px; 
    color:orange;
    cursor:pointer;
  }
  .normal_tr{
    height:40px; 
    font-weight:700;
    cursor:pointer;
  }

  #semi{
    text-align:left;
    font-weight:700;
    margin-left:70px;
    margin-right:auto;
  }
</style>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Film Culture Industry Analysis: What makes a movie successful</title>
	<link rel="stylesheet" href="Main.css">
    </head>

    <body>
        
      <div id="updeco">
        <a href="menu.html">Film Culture Industry Analysis: What makes a movie successful &nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div>

      
    <nav role="navigation">

      <ul id="main-menu">
  <li><a href="../menu/Main1.php">Distributor</a></li>
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
  <form action="feedback_update_check.php", method="post">
    <div id="contents">
      <h2 id = "title">Update Feedback</h2>
      contents : <br><input type = "text"  name = "cts" style="width:300px;height:200px;font-size:30px;"><br><br>
      <input type="submit" id='confirm' value="confirm"><br>

      <?php
      $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');
      if (mysqli_connect_errno()) {
        $res_conn = 'Connect failed: ' . mysqli_connect_error();
        exit();
      } else {
        $res_conn = 'Success!';
      }
      $sql = 'UPDATE feedback SET contents = ? WHERE id = ?';
      if (isset($_REQUEST['cts'])) {
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
          mysqli_stmt_bind_param($stmt, 'si', $_REQUEST['cts'], $_SESSION['id']);
          mysqli_stmt_execute($stmt);
          $res = mysqli_stmt_get_result($stmt);

          mysqli_free_result($res);
          mysqli_stmt_close($stmt);
          mysqli_close($mysqli);
          header('Location: feedback.php');
        } else {
          echo 'fail';
        }
      }
      ?>



  <br><br>

</form>

<div id ="logogreen">

  </div>
    </div>
  </p>
</section>
<div id="downdeco">
    &nbsp;&nbsp;&nbsp;&nbsp; Copyright &copy; GRAND_DATA_2022_All Rights Reserved. 
</div>
</body >

</html> 