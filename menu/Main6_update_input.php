<!DOCTYPE html>
<style>
  #list_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
  }
  #update{
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
  .input_box{
    width:180px;
    height:20px;
    font-size:12px;
    margin-left:3px;
		margin-right:3px;
		margin-top:3px;
		margin-bottom:3px
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
	<title>Grand Data</title>
	<link rel="stylesheet" href="Main.css">
    </head>

    <body>
        
      <div id="updeco">
        <a href="menu.html">Grand Data &nbsp;&nbsp;&nbsp;&nbsp;</a>
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
  
  <p>

    <div id = "contents">
      <h2 id = "title">Film Festivals</h2>
      <p>
        Update information of the festival selected.
      </p>
      <form action="Main6_update.php?festival_id=<?php echo $_GET['festival_id'] ?>" method="POST">
        <p><B>Update Information: </B><br>
        Name: <input type="text" class="input_box" name="festival_name"/><br>
        Category:
    <select name="category_id">
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
    </select><br>
        Continent: <input type="text" class="input_box" name="continent"><br>
        Country: <input type="text" class="input_box" name="country"><br>
        City: <input type="text" class="input_box" name="city"/><br>
        <input id="update" type="submit" value="Update Record"></p>
      </form>
    </div>
  </p>
</section>
<div id="downdeco">
    Copyright &copy; GRAND_DATA_2022_All Rights Reserved. 
</div>
</body >

</html> 