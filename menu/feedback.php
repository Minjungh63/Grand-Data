<?php session_start(); ?>
<!DOCTYPE html>
<style>
  #write{
    width: 100px;
    height: 45px;
    font-size: medium;
    padding: 5px;
    border-radius: 10px;
    font-weight: 700;
    background-color: #f3e5ab;
    border-color: #ffffff;
    color:#000;
    margin: auto;
  }
  #update{
    width: 60px;
    height: 30px;
    font-size: small;
    padding: 5px;
    border-radius: 10px;
    font-weight: 700;
    background-color: rgb(152, 188, 67);
    border-color: #ffffff;
    color:#000;
    text-align: center;
  }
  #delete{
    width: 60px;
    height: 30px;
    font-size: small;
    padding: 5px;
    border-radius: 10px;
    font-weight: 700;
    background-color: rgb(135, 20, 20);
    border-color: #ffffff;
    color:#000;
    text-align: center;
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

    <div id="contents">
      <h2 id = "title">Feedback</h2>
      <button id="write" type="submit" onclick="location.href='feedback_insert.php'"> Write </button>
      <br><br>
        <?php
        $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');
        if (mysqli_connect_errno()) {
          $res_conn = 'Connect failed: ' . mysqli_connect_error();
          exit();
        } else {
          $res_conn = 'Success!';
        }
        $sql = 'SELECT id, contents, nickname FROM feedback';
        $res = mysqli_query($mysqli, $sql);
        echo '<form method="get">';

        while ($newArr = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
          echo '<b>"' . $newArr['contents'] . '" written by ' . $newArr['nickname'] . '</b>'; ?>
          <div>
            <button id='update' type="button" name='update' value='<?php echo $newArr[
              'id'
            ]; ?>' onclick="location.href='feedback_update.php?id=<?php echo $newArr[
  'id'
]; ?>'"> update </button>
            <button id='delete' type='button' name='delete' value='<?php echo $newArr[
              'id'
            ]; ?>' onclick="location.href='feedback_delete.php?id=<?php echo $newArr[
  'id'
]; ?>'"> delete </button>
          </div>
          <?php
        }
        echo '</form><br>';
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