
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
      <h2 id = "title">Prefered Genre <br>by Distributor</h2>
      <br>
      <script>
        function toggleBtn() {
  
          // 토글 할 버튼 선택 (btn)
          const btn = document.getElementById('btn');

          // btn 숨기기 (display: none)
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
      <div id = btn>
      <form id = "btn_in" action="Main1_insert.php" method="POST" >
        <p><B>Insert a new Distributor: </B><br><br>
        Distributor Name: <input type="text" class="input_box" name="distributor_name" required/>&nbsp;

        &nbsp;<input id="insert" type="submit" value="Insert"></p>
      </form>

      <form id = "btn_up" action="Main1_update.php" method="POST" >
        <p><B>Update a Distributor: </B><br><br>
        Distributor Name: <input type="text" class="input_box" name="dname" required/>&nbsp;
        Update Name: <input type="text" class="input_box" name="distributor_name" required/>&nbsp;

        &nbsp;<input id="update" type="submit" value="Update"></p>
      </form>

      <form id = "btn_del" action="Main1_delete.php" method="POST" >
        <p><B>Delete a Distributor: </B><br><br>
        Distributor Name: <input type="text" class="input_box" name="distributor_name" required/>&nbsp;

        &nbsp;<input id="delete" type="submit" value="Delete"></p>
      </form>
      </div>

      <div>
        <input type='button' value='To Modify Distributor, Click Here!' id='btn2' onclick='toggleBtn()'>
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
<footer id="downdeco">
      Team 11 | Grand Data <br>
      Jeonghyun Lee, Minjung Jung, Meenso kwak, Suhyeon Choi
    </footer>
</body >

</html> 