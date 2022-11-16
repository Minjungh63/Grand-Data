<!DOCTYPE html>
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
        <li><a href="../menu/Main2.html">main2</a></li>
        <li><a href="../menu/Main3.html">main3</a></li>
        <li><a href="../menu/Main4.html">main4</a></li>
        <li><a href="../menu/Main5.html">main5</a></li>
        <li><a href="../menu/Main6.html">main6</a></li>
        <li><a href="../menu/Main7.php">main7</a></li>
        <li><a href="../menu/feedback.html">Feedback</a></li>
      </ul>
    </nav>


    <section>
    <div id = "contents">
      <h2 id = "title">Prefered Genre <br>by Distributor</h2>
 
      <form action="Main1.php" method="post" style="margin-bottom:5%">
       <select id="dropbox" name="scope">
         <option value="0" >Total
         <option value="10">Top 10
         <option value="100">Top 100
         <option value="300">Top 300
       </select>
       <input id="search" type="submit" value="search">
      </form>
      <?php
      header('Content-Type:text/html;charset=utf-8');
      $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');
      if (mysqli_connect_errno()) {
        printf("Connect failed:%s\n", mysqli_connect_error());
        exit();
      } else {
        $sql =
          'SELECT distributor_id, distributor_name, count(genre_id) as genre_cnt, genre_name FROM movie JOIN genre USING(genre_id) JOIN distributor USING(distributor_id) group by(distributor_id) ORDER BY genre_cnt DESC';
        $res = mysqli_query($mysqli, $sql);

        if ($res) {
          printf("<table id=\"ranking_table\">");
          //printf("%s",$table_title);
          $i = 0;
          while (
            (($ranking_list = mysqli_fetch_array($res, MYSQLI_ASSOC)) &&
              (int) $_POST['scope'] === 0) ||
            $i < (int) $_POST['scope']
          ) {
            $i = $i + 1;
            $distributor_name = $ranking_list['distributor_name'];
            $genre_name = $ranking_list['genre_name'];
            //$distributor_id = $ranking_list["distributor_id"];->배급사 누르면 배급사별 각 장르를 몇개 배급했는지 나오는 상세페이지..?
            //printf("<tr onclick= location.href='../menu/Main1_detail.php?distributor_id='+$distributor_id ");
            printf("<tr class=\"normal_tr\"><td><B> %d </B></td>", $i);
            printf(
              "<td style=\"width:460px\">%s</td><td style=\"width:200px\">🏆 %s</td></tr>",
              $distributor_name,
              $genre_name
            );
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
<div id="downdeco">
    &nbsp;&nbsp;&nbsp;&nbsp; Copyright &copy; GRAND_DATA_2022_All Rights Reserved. 
</div>
</body >

</html> 
