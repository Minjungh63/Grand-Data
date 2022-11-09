
<!DOCTYPE html>
<!DOCTYPE html>
<style>
  .normal_tr{
    height:60px; 
    font-weight:700;
    font-size: 18px;
  }
  #movie_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
  }
</style>
<html>
    <?php 
      $name = $_GET['director_name'];
      $id = $_GET['director_id'];
      $menu = $_GET['state']=="search" ? "0" : $_POST['menu'];
      ?>
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
        <li><a href="../menu/Main1.html">main1</a></li>
        <li><a href="../menu/Main2.html">main1</a></li>
        <li><a href="../menu/Main3.html">main3</a></li>
        <li><a href="../menu/Main4.html">main4</a></li>
        <li><a href="../menu/Main5.html">main5</a></li>
        <li><a href="../menu/Main6.html">main6</a></li>
        <li><a href="../menu/Main7.php">main7</a></li>
      </ul>
    </nav>


<section>
    <div id = "contents">
    <h2 id='title'><?php echo $_GET['director_name'];?></h2>
    <p>This page is an analysis of <?php echo $_GET['director_name'];?>'s movies.</p>
    <form action="Main5_detail.php?director_id=<?php echo $id;?>&&director_name=<?php echo $name;?>&&state=result" method="post" style="margin-bottom:5%">
       <select id="dropbox" name="menu">
         <option value="0" selected>Movie List 
         <option value="1">Screening Number
         <option value="2">Spectator
         <option value="3">Sales
       </select>
       <input id="search" type="submit" value="search">
   </form>
      <?php
        $mysqli=mysqli_connect("localhost","team11", "team11","team11");
        if(mysqli_connect_errno()){
            printf("Connect failed:%s\n",mysqli_connect_error());
            exit();
        }else{
            if($menu=='1'){
                $sql = "SELECT AVG(screen_num) as c1, MAX(screen_num) as c2 FROM movie JOIN screening_info USING(movie_id) JOIN director USING(director_id) WHERE director_id=".$_GET['director_id']." GROUP BY director_id";
                $title = "Screening Number of Films:";
                $head = "<tr class='normal_tr'><th>Average</th><th>Max</th></tr>";
              } else if($menu=='2') {
                $sql = "SELECT AVG(spectator_total) as c1, AVG(spectator_seoul) as c3, MAX(spectator_total) as c2, MAX(spectator_seoul) as c4 FROM movie JOIN spectator USING(movie_id) JOIN director USING(director_id) WHERE director_id=".$_GET['director_id']." GROUP BY director_id";
                $title = "Spectator Number of Films:";
                $head = "<tr class='normal_tr'><th>Average(Total)</th><th>Max(Total)</th><th>Average(Seoul)</th><th>Max(Seoul)</th</tr>";
              }else if($menu=='3') {
                $sql = "SELECT AVG(sales_total) as c1, AVG(sales_seoul) as c3, MAX(sales_total) as c2, MAX(sales_seoul) as c4 FROM movie JOIN sales USING(movie_id) JOIN director USING(director_id) WHERE director_id=".$_GET['director_id']." GROUP BY director_id";
                $title = "Sales of Films:";
                $head = "<tr class='normal_tr'><th>Average(Total)</th><th>Max(Total)</th><th>Average(Seoul)</th><th>Max(Seoul)</th</tr>";
              }else{
                $sql = "SELECT movie_name as c1, released_date as c2 FROM movie JOIN director USING(director_id) WHERE director_id=".$_GET['director_id']." ORDER BY released_date DESC";
                $title = "List of Films:";
                $head = "<tr class='normal_tr'><th>Movie Name</th><th>Released Date</th></tr>";
              }
            $res = mysqli_query($mysqli,$sql);
            $director_list = mysqli_fetch_array($res,MYSQLI_ASSOC);
            if($res){
                printf('<h2>%s</h2>',$title);
                printf("<table id=\"movie_table\">%s",$head);
                $i=0;
                    do{
                      $c1 = $director_list["c1"];
                      $c2 = $director_list["c2"];
                      printf("<tr class=\"normal_tr\"><td style=\"width:400px\"><B> %s </B></td><td style=\"width:400px\"> %s </td>",$c1, $c2);
                      if((int)$menu>1) {
                        $c3 = $director_list["c3"];
                        $c4 = $director_list["c4"];
                        printf("<td style=\"width:400px\"><B> %s </B></td><td style=\"width:400px\"> %s </td>",$c3, $c4);
                      }
                    }while($director_list = mysqli_fetch_array($res,MYSQLI_ASSOC));
                
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