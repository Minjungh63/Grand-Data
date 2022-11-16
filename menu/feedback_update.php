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

  #semi{
    text-align:left;
    font-weight:700;
    margin-left:70px;
    margin-right:auto;
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
      <h2 id = "title">Write Feedback</h2>
      비밀번호 확인 : 
      
      <?php

      ?>



  <br><br>

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

  $sql = 'INSERT  OVER (ORDER BY st DESC) AS ranking, M.movie_name AS mn, SUBSTRING(M.released_date,1,7) AS mm, S.sales_total AS st, SCR.screen_num AS sn 
  FROM movie M, sales S, screening_info SCR 
  WHERE M.released_date LIKE ? AND M.movie_id=S.movie_id AND M.movie_id=SCR.movie_id LIMIT 30;';

  if (isset($_POST['year']) && $_POST['year'] != 'non') {
    if (isset($_POST['month']) && $_POST['month'] != 'non') {
      $ver = 1;

      if ($stmt = mysqli_prepare($mysqli, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $ym);
        $ym = '%' . $_REQUEST['year'] . '-';

        if ((int) $_REQUEST['month'] < 10) {
          $ym = $ym . '0' . $_REQUEST['month'] . '%';
        } else {
          $ym = $ym . $_REQUEST['month'] . '%';
        }
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
      }
    } else {
      $ver = 2;

      if ($stmt = mysqli_prepare($mysqli, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $y);
        $y = '%' . $_REQUEST['year'] . '-%';
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
      }
    }
  } else {
    if (isset($_POST['month']) && $_POST['month'] != 'non') {
      $ver = 3;

      if ($stmt = mysqli_prepare($mysqli, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $m);
        if ((int) $_REQUEST['month'] < 10) {
          $m = '%-0' . $_REQUEST['month'] . '-%';
        } else {
          $m = '%-' . $_REQUEST['month'] . '-%';
        }

        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
      }
    }
  }

  if (isset($sql)) {
    if (isset($res)) {
      if ($ver == 1) {
        echo '<div id="semi">' . $_POST['year'] . '년 ' . $_POST['month'] . '월</div>';
        echo '<table id=rk_table>';
        while ($newArr = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
          $rk = $newArr['ranking'];
          $mn = $newArr['mn'];
          $sn = $newArr['sn'] . '관' . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
          if ($newArr['st'] > 100000000) {
            $st = (int) ($newArr['st'] / 100000000) . '억원';
          } else {
            $st = (int) ($newArr['st'] / 10000000) . '천만원';
          }
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
        echo '<div id="semi">' . $_POST['year'] . '년</div>';
        echo '<table id=rk_table>';
        while ($newArr = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
          $rk = $newArr['ranking'];
          $mn = $newArr['mn'];
          $sn = $newArr['sn'] . '관' . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
          if ($newArr['st'] > 100000000) {
            $st = (int) ($newArr['st'] / 100000000) . '억원';
          } else {
            $st = (int) ($newArr['st'] / 10000000) . '천만원';
          }
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
        echo '<div id="semi">' . $_POST['month'] . '월</div>';
        echo '<table id=rk_table>';
        while ($newArr = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
          $rk = $newArr['ranking'];
          $mn = $newArr['mn'];
          $sn = $newArr['sn'] . '관' . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
          if ($newArr['st'] > 100000000) {
            $st = (int) ($newArr['st'] / 100000000) . '억원';
          } else {
            $st = (int) ($newArr['st'] / 10000000) . '천만원';
          }
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
    }
    echo '</div>';
    mysqli_free_result($res);
    mysqli_close($mysqli);
  }
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