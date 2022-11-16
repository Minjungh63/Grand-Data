
<!DOCTYPE html>
<style>
  .normal_tr{
    height:60px; 
    font-weight:700;
    font-size: 18px;
  }
  .head_tr{
    height:60px; 
    font-weight:700;
    font-size: 25px;
    color: #bf0000;
  }
  .toCenter{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
    font-size:35px;
    padding:15px 0px;
  }
  #btn{
    display:none;
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
        <a href="menu.html">Grand Data &nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div>

      
    <nav role="navigation">

      <ul id="main-menu">
        <li><a href="../menu/Main1.php">main1</a></li>
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
      <h2 id = "title">Prefered Genre <br>by Distributor</h2>
      <br>
      <script>
        function toggleBtn() {
  
          // 토글 할 버튼 선택 (btn1)
          const btn = document.getElementById('btn');
          
          // btn1 숨기기 (display: none)
          if(btn.style.display !== 'none') {
            btn.style.display = 'none';
            btn2.style.display = 'block';
          }
          // btn` 보이기 (display: block)
          else {
            btn.style.display = 'block';
            btn2.style.display = 'none';
          }
          
        }
      </script>
      <form id = "btn" action="Main1_insert.php" method="POST" >
        <p><B>Insert a new theater: </B><br><br>
        Distributor Name: <input type="text" class="input_box" name="distributor_name" required/><br>
        Genre       Name: <input type="text" class="input_box" name="genre_name" required/><br><br>
        &nbsp;<input id="insert" type="submit" value="Insert"></p>
      </form>

      <div>
        <input type='button' value='To Insert Distributor and Genre, Click Here!' id='btn2' onclick='toggleBtn()'>
      </div>


      <?php header("Content-Type:text/html;charset=utf-8");
        $mysqli=mysqli_connect("localhost","team11", "team11","team11");
        if(mysqli_connect_errno()){
            printf("Connect failed:%s\n",mysqli_connect_error());
            exit();
        }else{
          $sql = "SELECT distributor_id, distributor_name, count(genre_id) as genre_cnt, genre_name FROM movie JOIN genre USING(genre_id) JOIN distributor USING(distributor_id) group by(distributor_id) ORDER BY genre_cnt DESC";
          $res = mysqli_query($mysqli,$sql);
         
        if($res){
          
            printf("<table id=\"ranking_table\">");
            //printf("%s",$table_title);
            $i=0;
            while($ranking_list = mysqli_fetch_array($res,MYSQLI_ASSOC)){
              $i = $i+1;
              $distributor_name = $ranking_list["distributor_name"];
              $genre_name = $ranking_list["genre_name"];
              printf("<tr class=\"normal_tr\"><td><B> %d </B></td>",$i);
              printf("<td style=\"width:460px\">%s</td><td style=\"width:200px\">🏆 %s</td></tr>",$distributor_name,$genre_name);
            }

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
    &nbsp;&nbsp;&nbsp;&nbsp; Copyright &copy; GRAND_DATA_2022_All Rights Reserved. 
</div>
</body >

</html> 
