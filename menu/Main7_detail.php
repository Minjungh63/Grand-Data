<!DOCTYPE html>
<style>
  #list_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
  }
  #delete{
    width: 120px;
    height: 40px;
    font-size: small;
    padding: 5px;
    border-radius: 10px;
    font-weight: 700;
    background-color: #000;
    color:#ffffff;
    margin: auto;
    display: block;
  }
  .list_tr{
    font-size:18px; 
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
        
    <p>

    <div id = "contents">
    <h2 id = "title">Theater</h2>
      <p>
        Information of theaters in the selected region.<br>
      </p>

<?php
$mysqli = mysqli_connect('localhost', 'team11', 'team11', 'team11');

if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
} else {
  $sql1 =
    "SELECT count(theater_id) AS theater_num, sum(hall_num) AS hall_sum, sum(seat_num) AS seat_sum FROM Theater JOIN Theater_Address USING(theater_id) WHERE city=\"" .
    $_GET['region'] .
    "\" OR district=\"" .
    $_GET['region'] .
    "\"";
  $sql2 =
    "SELECT * FROM Theater JOIN Theater_Address USING(theater_id) WHERE city=\"" .
    $_GET['region'] .
    "\" OR district=\"" .
    $_GET['region'] .
    "\"";
  $res1 = mysqli_query($mysqli, $sql1);
  $res2 = mysqli_query($mysqli, $sql2);
  if ($res1) {
    $newArray = mysqli_fetch_array($res1, MYSQLI_ASSOC);
    $theater_num = $newArray['theater_num'];
    $hall_sum = $newArray['hall_sum'];
    $seat_sum = $newArray['seat_sum'];
    printf('<p><B>%s</B>의<br>', $_GET['region']);
    printf('총 영화관 수: %d  /  ', $theater_num);
    printf('총 스크린 수: %d  /  ', $hall_sum);
    printf('총 좌석 수: %d</p>', $seat_sum);
  }
  if ($res2) {
    printf("<form action=\"Main7_delete.php\" method=\"post\"><table id=\"list_table\">");
    printf(
      "<tr class=\"list_tr\"><td><B> name </B></td><td><B> branch </B></td><td> hall </td><td> seat </td><td> city </td><td> district </td></tr>"
    );
    while ($newArray = mysqli_fetch_array($res2, MYSQLI_ASSOC)) {
      $theater_id = $newArray['theater_id'];
      $theater_name = $newArray['theater_name'];
      $branch = $newArray['branch'];
      $hall_num = $newArray['hall_num'];
      $seat_num = $newArray['seat_num'];
      $city = $newArray['city'];
      $district = $newArray['district'];
      printf(
        "<tr class=\"normal_tr\"><td><B> %s </B></td><td><B> %s </B></td><td> %d </td><td> %d </td>
            <td> %s </td><td> %s </td><td><input type=\"checkbox\" name=\"checkbox[]\" value=\"$theater_id\"></td></tr>",
            $theater_name, $branch, $hall_num, $seat_num, $city, $district
      );
    }
    printf('</table><br>');
    printf("<button id=\"delete\" type=\"submit\"> Remove Items </button></form>");
  } else {
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