
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
    <title>Grand Data</title>
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
        <li><a href="../menu/Main3.html">Released Date</a></li>
        <li><a href="../menu/Main4.html">Country</a></li>
        <li><a href="../menu/Main5.html">Director</a></li>
        <li><a href="../menu/Main6.html">Film Festivals</a></li>
        <li><a href="../menu/Main7.php">Theater</a></li>
        <li><a href="../menu/feedback.php">Feedback</a></li>
      </ul>
    </nav>


<section>
    <div id = "contents">
      <h2 id = "title">Ranking of<br>Most Award-winning Directors</h2>
      <p>
        This is the ranking of directors based on the number of awards they received at the film festival.<br>
        Please choose the range you want to search for.<br>
        <B>If you click on the row, you can view detailed information about the director.</B>
      </p>
      <form action="Main5.php" method="post" style="margin-bottom:5%">
       <select class="dropbox" name="scope">
         <option value="0" >Total
         <option value="10">Top 10
         <option value="100">Top 100
         <option value="300">Top 300
       </select>
       <input class="search" type="submit" value="search">
      </form>
      <?php
        $mysqli=mysqli_connect("localhost","team11", "team11","team11");
        if(mysqli_connect_errno()){
            printf("Connect failed:%s\n",mysqli_connect_error());
            exit();
        }else{
            $sql = "SELECT director_id, director_name, count(award_id) as award_cnt FROM movie JOIN award USING(movie_id) JOIN director USING(director_id) group by(director_id) ORDER BY award_cnt DESC";
            $res = mysqli_query($mysqli,$sql);
        if($res){
            printf("<table id=\"ranking_table\">");
            $i=0;
                while(($ranking_list = mysqli_fetch_array($res,MYSQLI_ASSOC))&& (int)$_POST["scope"]===0 || $i<(int)$_POST["scope"]){
                  $i = $i+1;
                  $director_name = $ranking_list["director_name"];
                  $award_cnt = $ranking_list["award_cnt"];
                  $director_id = $ranking_list["director_id"];
                  printf("<tr onclick= location.href='../menu/Main5_detail.php?director_id=%d&&director_name=%s&&state=search' ",$director_id,$director_name);
                  if($i==1) printf("class=\"ranking_tr\"><td width:100px> 🥇 </td>");
                  else if($i==2) printf("class=\"ranking_tr\" style=\"color:darkslategray;\"><td> 🥈 </td>");
                  else if($i==3) printf("class=\"ranking_tr\" style=\"color:brown;\"><td> 🥉 </td>");
                  else printf("class=\"normal_tr\"><td><B> %d </B></td>",$i);
                  printf("<td style=\"width:400px\">%s</td><td style=\"width:100px\">🏆 %d</td></tr>",$director_name,$award_cnt);
                }
                mysqli_free_result($res);
            
            printf("</table>");
        } else{
        printf("Could not get the ranking of directors: %s\n", mysqli_error($mysqli));
        }
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
