<!DOCTYPE html>
<style>
  #write{
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
    text-align: right;
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
    text-align: right;
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
        echo '<form method="post">';

        while ($newArr = mysqli_fetch_array($res, MYSQLI_ASSOC)) { 
          echo '<b>' . $newArr['contents'] . ' written by ' . $newArr['nickname'] . '</b>'; ?>
          <div>
            <input id='update' type="submit" name='update' value='<?php echo $newArr['id'] ?>' onclick="location.href='feedback_update.php'"> update </button>
            <button id='delete' type='button' name='delete' value='<?php echo $newArr['id'] ?>' onclick="location.href='feedback>delete.php'"> delete </button>
          </div>
          <?php }
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