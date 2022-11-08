<!DOCTYPE html>
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
        <li><a href="../menu/Main7.html">main7</a></li>
      </ul>
    </nav>


<section>
  
  <p>

    <div id = "contents">
      <h2 id = "title">월별 성공 정도</h2>
      &nbsp;&nbsp;&nbsp;
      
<form action="main3.php", method="post">
  <label for="cars">Choose month:</label>
  <select name="month">
    <option value="1">1월</option>
    <option value="2">2월</option>
    <option value="3">3월</option>
    <option value="4">4월</option>
    <option value="5">5월</option>
    <option value="6">6월</option>
    <option value="7">7월</option>
    <option value="8">8월</option>
    <option value="9">9월</option>
    <option value="10">10월</option>
    <option value="11">11월</option>
    <option value="12">12월</option>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>



<p>
    <table border cols=3>
        <tr><td>movie name</td><td>country</td><td>released date</td></tr>
        <?php
            $mysqli=mysqli_connect("localhost","team11","team11","team11");
            if(mysqli_connect_errno()){
                $res_conn="Connect failed: ".mysqli_connect_error();
                exit();
            }
            else {
                $res_conn="Success!";
            }
            if(isset($_POST['month'])){
                $sql="select * FROM movie WHERE movie_id<".$_POST['month'].";";
            }
            else{
                $sql="select * FROM movie WHERE movie_id=0;";
            }
            $res=mysqli_query($mysqli,$sql);
            if($res){
                while($newArr=mysqli_fetch_array($res,MYSQLI_ASSOC)){
                    $mn=$newArr['movie_name'];
                    $country=$newArr['country'];
                    $rd=$newArr['released_date'];
                    echo "<tr><td>".$mn."</td><td>".$country."</td><td>".$rd."</td></tr>";
                }
            }
            else{
                printf("cannot retrieve records!");
            }
            mysqli_free_result($res);
            mysqli_close($mysqli);
        ?>
    </table>
</p>

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