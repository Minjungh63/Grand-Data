<!DOCTYPE html>
<style>
  #list_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
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
    <h2 id="title">Film Festivals</h2>
      <?php
      $mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');
      if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
      } else {
        $sql = 'SELECT * FROM Festival JOIN Category USING(category_id)';
        $res = mysqli_query($mysqli, $sql);
        if ($res) {
          printf("<table id=\"list_table\">");
          printf(
            "<tr class=\"list_tr\"><td><B> name </B></td><td> category </td><td> continent </td><td> country </td><td> city </td></tr>"
          );
          while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $festival_id = $newArray['festival_id'];
            $festival_name = $newArray['festival_name'];
            $category_name = $newArray['category_name'];
            $continent = $newArray['continent'];
            $country = $newArray['country'];
            $city = $newArray['city'];
            printf(
              "<tr class=\"normal_tr\"><td><B> %s </B></td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td onclick=\"location.href='Main6_update_input.php?festival_id=$festival_id'\"><svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
              <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
            </svg></td>",
              $festival_name,
              $category_name,
              $continent,
              $country,
              $city
            );
          }
          printf('</table><br>');
        } else {
          printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
        }
        mysqli_free_result($res);
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
