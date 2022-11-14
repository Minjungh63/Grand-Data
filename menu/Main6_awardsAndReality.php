<!DOCTYPE html>
<style>
  #ranking_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
  }
  .ranking_tr{
    font-size:20px; 
    font-weight:700; 
    height:70px; 
    color:orange;
    cursor:pointer;
  }
  .ranking_tr:hover{
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
</style>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Grand Data</title>
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
      </ul>
    </nav>


<section>
    <div id = "contents">
    <h2 id="title">Film Festivals</h2>
      <p>
        Correlation between award winning films and films actually loved
      </p>
      <?php
      $mysqli = mysqli_connect("localhost", "team11", "team11", "team11");
      if(mysqli_connect_errno()){
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    else{
    }
?>

    </div>
</section>
<div id="downdeco">
Copyright &copy; GRAND_DATA_2022_All Rights Reserved. 
</div>
</body >
</html> 