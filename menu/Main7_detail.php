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
        
    <p>

    <div id = "contents">
    <h2 id = "title">Theater</h2>
      <p>
        Information of theaters in the selected region.<br>
      </p>
      <form action="Main7_insert.php" method="POST">
        <p><B>Insert a new theater in this region: </B><br>
        Name: <input type="text" class="input_box" name="theater_name" required/>
        Branch:<input type="text" class="input_box" name="branch" required/><br>
        Hall number: <input type="number" class="input_box" placeholer="enter a single number" name="hall_num">
        Seat number: <input type="number" class="input_box" placeholer="enter a single number" name="seat_num"><br>
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
    $sql1 = "SELECT count(theater_id) AS theater_num, sum(hall_num) AS hall_sum, sum(seat_num) AS seat_sum FROM Theater JOIN Theater_Address USING(theater_id) WHERE city=\"".$_GET["region"]."\" OR district=\"".$_GET["region"]."\"";
    $sql2 = "SELECT * FROM Theater JOIN Theater_Address USING(theater_id) WHERE city=\"".$_GET["region"]."\" OR district=\"".$_GET["region"]."\"";
    $res1 = mysqli_query($mysqli, $sql1);
    $res2 = mysqli_query($mysqli, $sql2);
    if($res1){
        $newArray = mysqli_fetch_array($res1, MYSQLI_ASSOC);
        $theater_num = $newArray['theater_num'];
        $hall_sum = $newArray['hall_sum'];
        $seat_sum = $newArray['seat_sum'];
        printf("<p><B>%s</B>의<br>", $_GET["region"]);
        printf("총 영화관 수: %d  /  ", $theater_num);
        printf("총 스크린 수: %d  /  ", $hall_sum);
        printf("총 좌석 수: %d</p>", $seat_sum);
    }
    if($res2){
        printf("<table id=\"list_table\">");
        printf("<tr class=\"list_tr\"><td><B> name </B></td><td><B> branch </B></td><td> hall </td><td> seat </td><td> city </td><td> district </td>");
        while($newArray = mysqli_fetch_array($res2, MYSQLI_ASSOC)){
            $theater_name = $newArray['theater_name'];
            $branch = $newArray['branch'];
            $hall_num = $newArray['hall_num'];
            $seat_num = $newArray['seat_num'];
            $city = $newArray['city'];
            $district = $newArray['district'];
            printf("<tr class=\"normal_tr\"><td><B> %s </B></td><td><B> %s </B></td><td> %d </td><td> %d </td><td> %s </td><td> %s </td>",$theater_name, $branch, $hall_num, $seat_num, $city, $district);
        }
        printf("</table>");
    }
    else{
        printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
    }
    mysqli_free_result($res1);
    mysqli_free_result($res2);
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