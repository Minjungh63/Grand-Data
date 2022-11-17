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
      <h2 id = "title">Ranking of<br>Genre</h2>
 
      <form action="Main2.php" method="post" style="margin-bottom:5%">
       <select class="dropbox" name="menu">
         <option value="sales" >Sales
         <option value="spectator">Spectator
         <option value="screen">Screen Number
       </select>
       <input class="search" type="submit" value="search">
      </form>
      <?php
      header('Content-Type:text/html;charset=utf-8');
      $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');
      if (mysqli_connect_errno()) {
        printf("Connect failed:%s\n", mysqli_connect_error());
        exit();
      } else {
        if ($_POST['menu'] == 'sales') {
          $sql =
            'SELECT genre_name, sum(sales_total) as total_cnt, sum(sales_seoul) as seoul_cnt FROM movie JOIN sales USING(movie_id) JOIN genre USING(genre_id) group by(genre_id) ORDER BY total_cnt DESC';
          $table_title = '<th><td> Genre </td><td> Total Sales </td><td> Seoul Sales </td></th>';
        } elseif ($_POST['menu'] == 'spectator') {
          $sql =
            'SELECT genre_name, sum(spectator_total) as total_cnt, sum(spectator_seoul) as seoul_cnt FROM movie JOIN spectator USING(movie_id) JOIN genre USING(genre_id) group by(genre_id) ORDER BY total_cnt DESC';
          $table_title =
            '<th><td> Genre </td><td> Total Spectator </td><td> Seoul Spectator </td></th>';
        } else {
          $sql =
            'SELECT genre_name, sum(screen_num) as total_cnt FROM movie JOIN screening_info USING(movie_id) JOIN genre USING(genre_id) group by(genre_id) ORDER BY total_cnt DESC';
          $table_title = '<th><td> Genre </td><td> Screening Number </td></th>';
        }
        $res = mysqli_query($mysqli, $sql);
        $length = mysqli_num_fields($res);
        if ($res) {
          printf("<table id=\"ranking_table\">");
          printf('%s', $table_title);
          $i = 0;
          while ($ranking_list = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $i = $i + 1;
            $genre_name = $ranking_list['genre_name'];
            $total = $ranking_list['total_cnt'];
            $total_a = number_format((int) $total);
            $seoul = $length == 3 ? $ranking_list['seoul_cnt'] : -1;
            $seoul_a = number_format((int) $seoul);

            if ($i == 1) {
              printf("<tr class=\"ranking_tr\"><td width:50px> 🥇 </td>");
            } elseif ($i == 2) {
              printf("<tr class=\"ranking_tr\" style=\"color:darkslategray;\"><td> 🥈 </td>");
            } elseif ($i == 3) {
              printf("<tr class=\"ranking_tr\" style=\"color:brown;\"><td> 🥉 </td>");
            } else {
              printf("<tr class=\"normal_tr\"><td><B> %d </B></td>", $i);
            }

            if ($seoul != -1) {
              printf(
                "<td style=\"width:240px\">%s</td><td style=\"width:300px\">💰 %s</td><td style=\"width:300px\">💰 %s</td></tr>",
                $genre_name,
                $total_a,
                $seoul_a
              );
            } else {
              printf(
                "<td style=\"width:240px\">%s</td><td style=\"width:300px\">%s</td></tr>",
                $genre_name,
                $total_a
              );
            }
          }

          printf('</table>');
        } else {
          printf("Could not get the ranking of directors: %s\n", mysqli_error($mysqli));
        }
        mysqli_close($mysqli);
      }
      ?>

    </div>
</section>
<footer id="downdeco">
      Team 11 | Grand Data <br>
      JeongHyeon Lee, Minjung Jung, Meenso kwak, Suhyeon Choi
    </footer>
</body >

</html> 
