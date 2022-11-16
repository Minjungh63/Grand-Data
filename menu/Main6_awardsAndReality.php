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
    cursor:pointer;
  }
  .ranking_tr:hover{
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
    <title>WhatMakesAMovieSuccessful</title>
    <link rel="stylesheet" href="Main.css">
    </head>

    <body>
        
      <div id="updeco">
        <a href="menu.html">Film Culture Industry Analysis: What makes a movie successful</a>
      </div>

      
      <nav role="navigation">

<ul id="main-menu">
  <li><a href="../menu/Main1.html">Distributor</a></li>
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
    <h2 id="title">Film Festivals</h2>
      <p>
        Correlation between award winning films and films actually loved (2010~)
      </p>
      <?php
      $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');
      if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
      } else {
        $sql = "SELECT RANK() OVER (ORDER BY COUNT(award_id) desc) AS Award_Rank, RANK() OVER (ORDER BY screen_num desc) AS Screening_Rank,
      RANK() OVER (ORDER BY sales_total desc) AS Sales_Rank, RANK() OVER (ORDER BY spectator_total desc) AS Spectator_Rank, movie_name
      FROM movie JOIN award USING(movie_id) JOIN screening_info USING(movie_id) JOIN sales USING(movie_id) JOIN spectator USING(movie_id) GROUP BY movie_id ORDER BY Award_Rank ASC";
        $res = mysqli_query($mysqli, $sql);
        if ($res) {
          printf("<table id=\"ranking_table\">");
          printf(
            "<tr class=\"normal_tr\"><td> Award Rank <td><B> movie_name </B><td> Screening Rank </td><td> Sales Rank </td><td> Spectator Rank </td></tr>"
          );
          while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $award_rank = $newArray['Award_Rank'];
            $screening_rank = $newArray['Screening_Rank'];
            $sales_rank = $newArray['Sales_Rank'];
            $spectator_rank = $newArray['Spectator_Rank'];
            $movie_name = $newArray['movie_name'];
            if ($award_rank == 1) {
              printf("<tr class=\"ranking_tr\"><td width:100px> 🥇 </td>");
            } elseif ($award_rank == 2) {
              printf("<tr class=\"ranking_tr\" style=\"color:darkslategray;\"><td> 🥈 </td>");
            } elseif ($award_rank == 3) {
              printf("<tr class=\"ranking_tr\" style=\"color:brown;\"><td> 🥉 </td>");
            } else {
              printf("<tr class=\"normal_tr\"><td><B> %d </B></td>", $award_rank);
            }
            printf(
              "<td style=\"width:400px\">%s</td><td> %d</td><td> %d</td><td> %d</td></tr>",
              $movie_name,
              $screening_rank,
              $sales_rank,
              $spectator_rank
            );
          }
        }
        printf('</table>');
        mysqli_free_result($res);
        mysqli_close($mysqli);
      }
      ?>

    </div>
</section>
<div id="downdeco">
Copyright &copy; GRAND_DATA_2022_All Rights Reserved. 
</div>
</body >
</html> 