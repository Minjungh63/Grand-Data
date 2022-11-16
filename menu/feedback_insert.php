<!DOCTYPE html>
<style>
  #submit{
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
<form action="feedback_insert.php", method="post">
  <p>
    <div id="contents">
      <h2 id = "title">Write Feedback</h2>
      nickname : <INPUT TYPE = "TEXT"  NAME = "nn" SIZE = "20" >
      <br>
      password : <INPUT TYPE = "password"  NAME = "pw" SIZE = "20" >
      <br>
      contents  : <br><INPUT TYPE = "TEXT"  NAME = "cts" style="width:300px;height:200px;font-size:30px;">
      
      <form action="feedback_insert.php", method="post">
  <br><br>
  <input type="submit" value="submit" id="submit">
</form>

<?php
  $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');
  if (mysqli_connect_errno()) {
    $res_conn = 'Connect failed: ' . mysqli_connect_error();
    exit();
  } else {
    $res_conn = 'Success!';
  }

  $sql = "INSERT INTO Feedback(nickname, pw, contents) VALUES(?,?,?)";
  if(isset($_POST['nn']) & isset($_POST['pw']) & isset($_POST['cts'])){
    if ($stmt = mysqli_prepare($mysqli, $sql)) {
      mysqli_stmt_bind_param($stmt, 'sss', $nn, $pw, $cts);
      $nn = $_POST['nn'];
      $pw = $_POST['pw'];
      $cts = $_POST['cts'];
  
      mysqli_stmt_execute($stmt);
    }
    mysqli_close($mysqli);
    header("Location: feedback.php", TRUE, 301);
    exit();
  
  }
?>
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