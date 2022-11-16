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
        Please choose the criteria by which you want to sort the film festivals.
      </p>
      <form action="Main6.php" method="post">
       <select class="dropbox" name="sorting">
         <option value="category" selected>Category
         <option value="continent">Continent
         <option value="country">Country
       </select>
       <input class="search" type="submit" value="search">
      </form>
      <?php
      $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');
      if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
      } else {
        if ($_POST['sorting'] == 'category') {
          printf('<p>Which category has the most film festivals?</p>');
          $sql =
            'SELECT RANK() OVER (ORDER BY COUNT(category_id) desc) AS Rank, category_name, COUNT(festival_name) AS festival_num FROM Category JOIN Festival USING(category_id) GROUP BY category_id ORDER BY Rank ASC';
          $res = mysqli_query($mysqli, $sql);
          if ($res) {
            printf("<table id=\"ranking_table\">");
            $i = 0;
            while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
              $rank = $newArray['Rank'] + $i;
              $category_name = $newArray['category_name'];
              $festival_num = $newArray['festival_num'];
              if ($category_name == '기타') {
                $i = -1;
                continue;
              }
              if ($rank == 1) {
                printf("<tr class=\"ranking_tr\"><td width:100px> 🥇 </td>");
              } elseif ($rank == 2) {
                printf("<tr class=\"ranking_tr\" style=\"color:darkslategray;\"><td> 🥈 </td>");
              } elseif ($rank == 3) {
                printf("<tr class=\"ranking_tr\" style=\"color:brown;\"><td> 🥉 </td>");
              } else {
                printf("<tr class=\"normal_tr\"><td><B> %d </B></td>", $rank);
              }
              printf(
                "<td style=\"width:400px\">%s</td><td style=\"width:100px\">🎉 %d</td></tr>",
                $category_name,
                $festival_num
              );
            }
          }
          printf('</table>');
          mysqli_free_result($res);
        } elseif ($_POST['sorting'] == 'continent') {
          printf('<p>Which continent has the most film festivals?</p>');
          $sql =
            'SELECT RANK() OVER (ORDER BY COUNT(continent) desc) AS Rank, continent, COUNT(festival_name) AS festival_num FROM Festival GROUP BY continent ORDER BY Rank ASC';
          $res = mysqli_query($mysqli, $sql);
          if ($res) {
            printf("<table id=\"ranking_table\">");
            $i = 0;
            while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
              $rank = $newArray['Rank'];
              $continent = $newArray['continent'];
              $festival_num = $newArray['festival_num'];
              if ($continent == 'NULL') {
                $i = -1;
                continue;
              }
              if ($rank == 1) {
                printf("<tr class=\"ranking_tr\"><td width:100px> 🥇 </td>");
              } elseif ($rank == 2) {
                printf("<tr class=\"ranking_tr\" style=\"color:darkslategray;\"><td> 🥈 </td>");
              } elseif ($rank == 3) {
                printf("<tr class=\"ranking_tr\" style=\"color:brown;\"><td> 🥉 </td>");
              } else {
                printf("<tr class=\"normal_tr\"><td><B> %d </B></td>", $rank);
              }
              printf(
                "<td style=\"width:400px\">%s</td><td style=\"width:100px\">🎉 %d</td></tr>",
                $continent,
                $festival_num
              );
            }
          }
          printf('</table>');
          mysqli_free_result($res);
        } elseif ($_POST['sorting'] == 'country') {
          printf('<p>Which country has the most film festivals?</p>');
          $sql =
            'SELECT RANK() OVER (ORDER BY COUNT(continent) DESC) AS Rank, country, COUNT(festival_name) AS festival_num FROM Festival GROUP BY country ORDER BY Rank ASC';
          $res = mysqli_query($mysqli, $sql);
          if ($res) {
            printf("<table id=\"ranking_table\">");
            $i = 0;
            while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
              $rank = $newArray['Rank'];
              $country = $newArray['country'];
              $festival_num = $newArray['festival_num'];
              if ($country == 'NULL') {
                $i = -1;
                continue;
              }
              if ($rank == 1) {
                printf("<tr class=\"ranking_tr\"><td width:100px> 🥇 </td>");
              } elseif ($rank == 2) {
                printf("<tr class=\"ranking_tr\" style=\"color:darkslategray;\"><td> 🥈 </td>");
              } elseif ($rank == 3) {
                printf("<tr class=\"ranking_tr\" style=\"color:brown;\"><td> 🥉 </td>");
              } else {
                printf("<tr class=\"normal_tr\"><td><B> %d </B></td>", $rank);
              }
              printf(
                "<td style=\"width:400px\">%s</td><td style=\"width:100px\">🎉 %d</td></tr>",
                $country,
                $festival_num
              );
            }
          }
          printf('</table>');
          mysqli_free_result($res);
        } elseif ($_POST['sorting'] == 'special') {
          printf('<p>Correlation between award winning films and films actually loved</p>');
          //$sql = "SELECT RANK() OVER (ORDER BY COUNT(movie_id) desc)"
        } else {
          printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
        }
        mysqli_close($mysqli);
      }
      ?>

    </div>
</section>
<footer id="downdeco">
      Team 11 | Grand Data <br>
      JeongHyeon Lee, Minjung Jung, Minso Fwak, Suhyeon Choe
    </footer>
</body >
</html> 