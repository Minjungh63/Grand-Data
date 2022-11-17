<!DOCTYPE html>
<style>
  .normal_tr{
    height:60px; 
    font-weight:700;
    font-size: 18px;
  }
  .head_tr{
    height:60px; 
    font-weight:700;
    font-size: 25px;
    color: #bf0000;
  }
  .toCenter{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
    font-size:35px;
    padding:15px 0px;
  }
  #btn{
    display:none;
  }
</style>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Grand Data</title>
	<link rel="stylesheet" href="Main.css">
    </head>

    <body>
        
      <div id="updeco">
        <a href="menu.html">Grand Data &nbsp;&nbsp;&nbsp;&nbsp;</a>
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
    <div id = "contents">
      <h2 id = "title">Prefered Genre <br>by Distributor</h2>
      <br>


      <?php
      $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');

      if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
      } else {
        mysqli_begin_transaction($mysqli);
        try {
            $sql2 = 'SELECT MAX(distributor_id)+1 AS distributor_id FROM distributor';
            $res2 = mysqli_query($mysqli, $sql2);
            $res2Array = mysqli_fetch_array($res2, MYSQLI_ASSOC);

          if ($_POST['distributor_name'] != null) {
            $sql = 'UPDATE distributor SET distributor_name=? WHERE distributor_id=?';
            if ($stmt = mysqli_prepare($mysqli, $sql)) {
              mysqli_stmt_bind_param($stmt, 'is', $id, $update);
              $id = $res2Array['distributor_id'];
              $update = $_REQUEST['distributor_name'];
              mysqli_stmt_execute($stmt);
              mysqli_stmt_close($stmt);
            }
          }
         
          mysqli_commit($mysqli);
          echo 'Update Successful.';
        } catch (mysqli_sql_exception $exception) {
          mysqli_rollback($mysqli);
          throw $exception;
        }
        mysqli_close($mysqli);
      }
      ?>

    </div>
</section>
<div id="downdeco">
    &nbsp;&nbsp;&nbsp;&nbsp; Copyright &copy; GRAND_DATA_2022_All Rights Reserved. 
</div>
</body >

</html> 


      


