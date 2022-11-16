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
  }
  .normal_tr{
    height:40px; 
    font-weight:700;
  }
  .regionButton{
    width: 300px;
    height: 40px;
    font-size: medium;
    padding: 3px;
    border-radius: 5px;
    font-weight: 700;
    background-color: #ffffff;
    color:#000;
    border-color: #C0C0C0;
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
      <h2 id = "title">Theater</h2>
      <p>
        This is the total number of theater, hall, and seat of each region.<br>
        Click on a city or a district for more detailed information.
      </p>
      <form action="Main7_insert.php" method="POST">
        <p><B>Insert a new theater: </B><br>
        Name: <input type="text" class="input_box" name="theater_name" required/>
        Branch:<input type="text" class="input_box" name="branch" required/><br>
        Hall number: <input type="number" class="input_box" placeholder="numeber only" name="hall_num">
        Seat number: <input type="number" class="input_box" placeholder="number only" name="seat_num"><br>
        City: <input type="text" class="input_box" name="city" required/>
        District: <input type="text" class="input_box" name="district" required/><br>
        <input id="insert" type="submit" value="Insert Record"></p>
      </form>
      <?php
$mysqli = mysqli_connect("localhost", "team11", "team11", "team11");

if(mysqli_connect_errno()){
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
else{
    $sql = "SELECT count(theater_id) AS theater_num, sum(hall_num) AS hall_sum, sum(seat_num) AS seat_sum,
    COALESCE(district, city) AS region
    FROM Theater JOIN Theater_Address USING(theater_id) GROUP BY city, district WITH ROLLUP";
    $res = mysqli_query($mysqli, $sql);
    if($res){
        printf("<table id=\"list_table\">");
        printf("<tr class=\"list_tr\"><td><B> District/City </B></td><td> theater </td><td> hall </td><td> seat </td></tr>");
        while($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
          $region = $newArray['region'];
          $theater_num = $newArray['theater_num'];
          $hall_sum = $newArray['hall_sum'];
          $seat_sum = $newArray['seat_sum'];
          if($region==NULL) $region="Total";
          printf("<tr class=\"normal_tr\"><td><button class=\"regionButton\" onclick=\"location.href='Main7_detail.php?region=$region'\"> %s </button></td><td> %d </td><td> %d </td><td> %d </td></tr>",$region, $theater_num, $hall_sum, $seat_sum);
        }
        printf("</table>");
    }
    else{
        printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
    }
    mysqli_free_result($res);
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