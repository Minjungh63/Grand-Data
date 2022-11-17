<!DOCTYPE html>
<style>
  #list_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
  }
  #update{
    width: 180px;
    height: 50px;
    font-size: medium;
    padding: 3px;
    border-radius: 5px;
    background-color: rgb(135, 20, 20);
    border-color: #ffffff;
    color:#ffffff;
    font-family: 'Ycomputer-Regular';
  }
  .input_box{
    width: 200px;
    height: 30px;
    font-size: medium;
    padding: 3px;
    border-radius: 3px;
    font-weight: 700;
    font-family: 'Ycomputer-Regular';
  }
  select{
    width: 210px;
    height: 40px;
    font-size: medium;
    padding: 3px;
    border-radius: 5px;
    font-weight: 700;
    font-family: 'Ycomputer-Regular';
  }
  .list_tr{
    font-size:20px; 
    font-weight:700; 
    height:70px; 
    cursor:pointer;
  }
  .list_tr:hover{
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
  .regionButton{
    width: 150px;
    height: 40px;
    font-size: medium;
    padding: 3px;
    border-radius: 5px;
    font-weight: 700;
    background-color: #ffffff;
    color:#000;
    border-color: #C0C0C0;
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

    <div id = "contents">
      <h2 id = "title">Film Festivals</h2>
      <p>
        Update information of the festival selected.
      </p>
      <form action="Main6_update.php?festival_id=<?php echo $_GET['festival_id']; ?>" method="POST">
        <p><B>Update Information: </B><br>
        <p>Name: <input type="text" class="input_box" name="festival_name" style="margin-left:32px;"/><br></p>
        <p>Category:
        <select name="category_id" style="margin-left:6px;">
            <option value=11 selected>---</option>
            <option value=1>장편</option>
            <option value=2>단편</option>
            <option value=3>애니</option>
            <option value=4>독립</option>
            <option value=5>다큐</option>
            <option value=6>청소년</option>
            <option value=7>판타지</option>
            <option value=8>호러/스릴러</option>
            <option value=9>퀴어</option>
            <option value=10>기타</option>
        </select><br></p>
        <p>Continent: <input type="text" class="input_box" name="continent"><br></p>
        <p>Country: <input type="text" class="input_box" name="country" style="margin-left:13px;"><br></p>
        <p>City: <input type="text" class="input_box" name="city" style="margin-left:44px;"/><br></p>
        <input id="update" type="submit" value="Update Record" style="margin-left:65px;"></p>
      </form>
    </div>
  </p>
</section>
<footer id="downdeco">
      Team 11 | Grand Data <br>
      JeongHyeon Lee, Minjung Jung, Meenso kwak, Suhyeon Choi
    </footer>
</body >

</html> 
