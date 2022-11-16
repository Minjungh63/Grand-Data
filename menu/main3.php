<!DOCTYPE html>
<style>
  #rk_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
  }
  .rk_tr{
    font-size:20px; 
    font-weight:700; 
    height:70px; 
    color:orange;
    cursor:pointer;
  }
  .rk_tr:hover{
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

    <div>
      <h2 id = "title">YEAR/MONTH TOTAL SALES</h2>
      &nbsp;&nbsp;&nbsp;
      
      <form action="main3.php", method="post">
  <label for="yearLabel">Choose year:</label>
  <select name="year">
    <option value="non">---</option>
    <option value="2022">2022</option>
    <option value="2021">2021</option>
    <option value="2020">2020</option>
    <option value="2019">2019</option>
    <option value="2018">2018</option>
    <option value="2017">2017</option>
    <option value="2016">2016</option>
    <option value="2015">2015</option>
    <option value="2014">2014</option>
    <option value="2013">2013</option>
    <option value="2012">2012</option>
    <option value="2011">2011</option>
    <option value="2010">2010</option>
  </select>
  <br><br>
  <label for="monthLabel">Choose month:</label>
  <select name="month">
    <option value="non">---</option>
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
  <?php
  $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');
  if (mysqli_connect_errno()) {
    $res_conn = 'Connect failed: ' . mysqli_connect_error();
    exit();
  } else {
    $res_conn = 'Success!';
  }
  if ($_POST['year'] != 'non') {
    if ($_POST['month'] != 'non') {
      $ver = 1;

      $sql =
        'SELECT rank() OVER (ORDER BY st DESC) AS ranking, M.movie_name AS mn, SUBSTRING(M.released_date,1,7) AS mm, S.sales_total AS st, SCR.screen_num AS sn FROM movie M, sales S, screening_info SCR WHERE SUBSTRING(M.released_date,1,7)=' .
        $_POST['year'] .
        '-' .
        $_POST['month'] .
        ' AND M.movie_id=S.movie_id AND M.movie_id=SCR.movie_id LIMIT 100;';

    } else {
      $ver = 2;

      $sql =
        'SELECT rank() OVER (ORDER BY st DESC) AS ranking, M.movie_name AS mn, SUBSTRING(M.released_date,1,4) AS yy, S.sales_total AS st, SCR.screen_num AS sn FROM movie M, sales S, screening_info SCR WHERE SUBSTRING(M.released_date,1,4)=' .
        $_POST['year'] .
        ' AND M.movie_id=S.movie_id AND M.movie_id=SCR.movie_id LIMIT 100;';
    }
  } else {
    if ($_POST['month'] != 'non') {
      $ver = 3;

      $sql =
        'SELECT rank() OVER (ORDER BY st DESC) AS ranking, M.movie_name AS mn, SUBSTRING(M.released_date,6,7) AS mm, S.sales_total AS st, SCR.screen_num AS sn FROM movie M, sales S, screening_info SCR WHERE SUBSTRING(M.released_date,6,7)=' .
        $_POST['month'] .
        ' AND M.movie_id=S.movie_id AND M.movie_id=SCR.movie_id LIMIT 100;';
    } else {
      echo 'Choose something!';
    }
  }

  $res = mysqli_query($mysqli, $sql);

  if ($res) {
    if ($ver == 1) {
      echo "<br>".$_POST['year']."년 ".$_POST['month']."월<br><br>";
      echo '<table id=rk_table>';
      while ($newArr = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $rk = $newArr['ranking'];
        $mn = $newArr['mn'];
        $sn = $newArr['sn'].'관'.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
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

        echo '<td>' . $mn . '</td><td>' . $sn . '</td><td>' . $st . '</td></tr>';
      }
      echo '</table>';
    } elseif ($ver == 2) {
      echo "<br>".$_POST['year']."년<br><br>";
      echo '<table id=rk_table>';
      while ($newArr = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $rk = $newArr['ranking'];
        $mn = $newArr['mn'];
        $sn = $newArr['sn'].'관'.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
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

        echo '<td>' . $mn . '</td><td>' . $sn . '</td><td>' . $st . '</td></tr>';
      }
      echo '</table>';
    } elseif ($ver == 3) {
      echo "<br>".$_POST['month']."월<br><br>";
      echo '<table id=rk_table>';
      while ($newArr = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $rk = $newArr['ranking'];
        $mn = $newArr['mn'];
        $sn = $newArr['sn'].'관'.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
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

        echo '<td>' . $mn . '</td><td>' . $sn . '</td><td>' . $st . '</td></tr>';
      }
      echo '</table>';
    }
  } else {
    printf('cannot retrieve records!');
  }
  mysqli_free_result($res);
  mysqli_close($mysqli);
  ?>
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