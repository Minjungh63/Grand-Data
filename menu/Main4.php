<!DOCTYPE html>
<style>
  #rk_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
    width:70%;
  }
  .rk_tr{
    font-size:20px; 
    font-weight:700; 
    height:70px; 
    color:orange;
  }
  .sh_tr{
    font-size:20px; 
    font-weight:700; 
    height:35px; 
    color: black;
  }

  .normal_tr{
    height:40px; 
    font-weight:700;
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
          <li><a href="../menu/Main3.html">Released Date</a></li>
          <li><a href="../menu/Main4.html">Country</a></li>
          <li><a href="../menu/Main5.html">Director</a></li>
          <li><a href="../menu/Main6.html">Film Festivals</a></li>
          <li><a href="../menu/Main7.php">Theater</a></li>
          <li><a href="../menu/feedback.php">Feedback</a></li>
        </ul>
      </nav>


<section>
  
  <p>

    <div id="contents">
      <h2 id = "title">Country sales</h2>
      <p>
          Please choose the country to view information about sales.
          <br>
          If submit nothing, you can view total sales, average sales, and maximun sales of one movie in each country.
      <br>
      </p>
      <form action="Main4.php", method="post">
      <div>
            <input type="radio" name="country" id="1" value="한국">한국
            <input type="radio" name="country" id="2" value="미국">미국
            <input type="radio" name="country" id="3" value="일본">일본
            <input type="radio" name="country" id="4" value="프랑스">프랑스
            <input type="radio" name="country" id="5" value="영국">영국
            <input type="radio" name="country" id="6" value="중국">중국   
            <input type="radio" name="country" id="7" value="독일">독일
            <input type="radio" name="country" id="8" value="캐나다">캐나다
            <input type="radio" name="country" id="9" value="홍콩">홍콩
            <input type="radio" name="country" id="10" value="스페인">스페인
            <input type="radio" name="country" id="11" value="러시아">러시아
            <input type="radio" name="country" id="12" value="이탈리아">이탈리아  
            <br><br>
            <div style=" text-align: center;">
                <input type="submit" value="Submit" class="search">
            </div>
  <?php
  $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');
  if (mysqli_connect_errno()) {
    $res_conn = 'Connect failed: ' . mysqli_connect_error();
    exit();
  } else {
    $res_conn = 'Success!';
  }

  $sql1 = 'SELECT rank() OVER (ORDER BY sum DESC) AS rk, country, SUM(sales_total) AS sum, AVG(sales_total) AS avg, MAX(sales_total) AS max
       FROM movie Join sales ON movie.movie_id=sales.movie_id 
       GROUP BY country HAVING count(*)>100
       ORDER BY sum DESC;';
  $res1 = mysqli_query($mysqli, $sql1);

  if (isset($_POST['country'])) {
    $sql = 'SELECT rank() OVER (ORDER BY st DESC) AS rk, movie_name AS mn, s.sales_total AS st 
    FROM movie m, sales s 
    WHERE m.movie_id=s.movie_id AND country=? LIMIT 10;';
    if ($stmt = mysqli_prepare($mysqli, $sql)) {
      mysqli_stmt_bind_param($stmt, 's', $country);
      $country = $_REQUEST['country'];
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
    }
  }

  if (isset($res1) && !isset($res)) {
    echo '<table id="rk_table">';
    echo '<tr class="rk_tr"><td width:160px>순위</td><td width:160px>나라</td><td width:160px>총매출</td><td width:160px>평균매출</td><td width:160px>최대매출</td></tr>';
    while ($newArr = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
      $rk = $newArr['rk'];
      $ct = $newArr['country'];
      $sum = (int) ($newArr['sum'] / 100000000) . '억원';
      if ($newArr['avg'] > 100000000) {
        $avg = (int) ($newArr['avg'] / 100000000) . '억원';
      } else {
        $avg = (int) ($newArr['avg'] / 10000000) . '천만원';
      }
      $max = (int) ($newArr['max'] / 100000000) . '억원';

      if ($rk == 1) {
        echo '<tr class="rk_tr"><td width:100px> 🥇 </td>';
      } elseif ($rk == 2) {
        echo '<tr class="rk_tr" style="color:darkslategray;"><td> 🥈 </td>';
      } elseif ($rk == 3) {
        echo '<tr class="rk_tr" style="color:brown;"><td> 🥉 </td>';
      } else {
        echo '<tr class="normal_tr"><td><B>' . $rk . '</B></td>';
      }

      echo '<td width:160px>' .
        $ct .
        '</td><td width:160px>' .
        $sum .
        '</td><td width:160px>' .
        $avg .
        '</td><td width:160px>' .
        $max .
        '</td>';
    }
    echo '</table>';
  }
  if (isset($res)) {
    echo '<table id=rk_table>';
    while ($newArr = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
      $rk = $newArr['rk'];
      $mn = $newArr['mn'];
      $st = (int) ($newArr['st'] / 100000000) . '억원';
      if ($rk == 1) {
        echo '<tr class="rk_tr"><td width:100px> 🥇 </td>';
      } elseif ($rk == 2) {
        echo '<tr class="rk_tr" style="color:darkslategray;"><td> 🥈 </td>';
      } elseif ($rk == 3) {
        echo '<tr class="rk_tr" style="color:brown;"><td> 🥉 </td>';
      } else {
        echo '<tr class="normal_tr"><td><B>' . $rk . '</B></td>';
      }

      echo '<td>&nbsp&nbsp&nbsp&nbsp' . $mn . '&nbsp&nbsp&nbsp&nbsp</td><td>' . $st . '</td></tr>';
    }
    echo '</table>';
    mysqli_free_result($res);
    mysqli_stmt_close($stmt);
  } else {
    echo '';
  }

  mysqli_close($mysqli);
  ?>
</p>

        </div>
</form>

<div id ="logogreen">

  </div>
    </div>
  </p>
</section>
<footer id="downdeco">
      Team 11 | Grand Data <br>
      JeongHyeon Lee, Minjung Jung, Minso Fwak, Suhyeon Choe
    </footer>
</body >

</html> 
