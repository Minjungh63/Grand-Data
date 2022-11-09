
<!DOCTYPE html>
<style>
  .normal_tr{
    height:40px; 
    font-weight:700;
    cursor:pointer;
  }
  #movie_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
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
        <li><a href="../menu/Main1.html">main1</a></li>
        <li><a href="../menu/Main2.html">main2</a></li>
        <li><a href="../menu/Main3.html">main3</a></li>
        <li><a href="../menu/Main4.html">main4</a></li>
        <li><a href="../menu/Main5.html">main5</a></li>
        <li><a href="../menu/Main6.html">main6</a></li>
        <li><a href="../menu/Main7.html">main7</a></li>
      </ul>
    </nav>


<section>
    <div id = "contents">
      <?php header("Content-Type:text/html;charset=utf-8");
        $mysqli=mysqli_connect("localhost","team11", "team11","team11");
        if(mysqli_connect_errno()){
            printf("Connect failed:%s\n",mysqli_connect_error());
            exit();
        }else{
            $sql = "SELECT distributor_name, genre_name, count(genre_id) as genre_cnt FROM movie JOIN genre USING(genre_id) JOIN distributor USING(distributor_id) group by(distributor_name) ORDER BY genre_cnt DESC";
            $res = mysqli_query($mysqli,$sql);
            $genre_list = mysqli_fetch_array($res,MYSQLI_ASSOC);
            if($res){
                printf('<h2 id=\'title\'>%s</h2>',$genre_list['genre_name']);
                printf('<p>This page is an analysis of %s\'s genre.</p>',$movie_list['distributor_name']);
                printf('<h2>List of films produced by %s</h2>',$genre_list['distributor_name']);
                printf("<table id=\"movie_table\">");
                $i=0;
                    do{
                      $distributor_name = $genre_list["distributor_name"];
                      $genre_name = $genre_list["genre_name"];
                      $genre_cnt = $genre_list["genre_cnt"];
                      printf("<tr class=\"normal_tr\"><td style=\"width:400px\"><B> %s </B></td><td style=\"width:400px\"> %s </td>",$genre_name, $genre_cnt);
                    }while($genre_list = mysqli_fetch_array($res,MYSQLI_ASSOC));
                
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