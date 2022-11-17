
<!DOCTYPE html>
<style>
  select{
    width: 300px;
    height: 50px;
    font-size: medium;
    padding: 3px;
    border-radius: 5px;
    font-weight: 700;
    font-family: 'Ycomputer-Regular';
  }
  .datebox{
    width: 77px;
    height: 50px;
    font-size: medium;
    padding: 3px;
    border-radius: 5px;
    font-weight: 700;
    font-family: 'Ycomputer-Regular';
  }
  .inputText{
    width: 290px;
    height: 40px;
    font-size: medium;
    padding: 3px;
    border-radius: 3px;
    font-weight: 700;
    font-family: 'Ycomputer-Regular';
  }
  .add{
    width: 300px;
    height: 50px;
    font-size: medium;
    padding: 3px;
    border-radius: 5px;
    background-color: #000;
    color:#ffffff;
    margin-left:105px;
    font-family: 'Ycomputer-Regular';
  }
</style>
<html>
    <?php
        $name = $_GET['name'];
        $key = $_GET['key'];
        $year = date("Y");
        $mysqli=mysqli_connect("localhost","team11", "team11","team11");
        $sql = "UPDATE movie SET ?=? WHERE movie_id=?";
      if($mysqli === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }
      if($_GET['state']=="updated"){
        if($stmt=mysqli_prepare($mysqli,$sql)){
          mysqli_stmt_bind_param($stmt,"si",$val,$movie_title,$movie_id);
          $val = "movie_name";
          $movie_title=$_POST['new_title'];
          $movie_id=$key;
          mysqli_stmt_execute($stmt);

          $val = "genre_id";
          $movie_title=$_POST['new_genre'];
          $movie_id=$key;
          mysqli_stmt_execute($stmt);

          $val = "category_id";
          $movie_title=$_POST['new_category'];
          $movie_id=$key;
          mysqli_stmt_execute($stmt);

          $val = "distributor_id";
          $movie_title=$_POST['new_distributor'];
          $movie_id=$key;
          mysqli_stmt_execute($stmt);
          
          $val = "country";
          $movie_title=$_POST['new_country'];
          $movie_id=$key;
          mysqli_stmt_execute($stmt);

          $val = "released_date";
          $movie_title=$_POST['new_year'];
          $movie_id=$key;
          mysqli_stmt_execute($stmt);

          $val = "film_rating";
          $movie_title=$_POST['new_film_rating'];
          $movie_id=$key;
          mysqli_stmt_execute($stmt);

          echo '<script>alert("Update Successfully.")</script>';
          printf('<script>location.href="Main5_update.php?key=%s&&name=%s&&state=write";</script>',$key,$_POST['new_title']);

          mysqli_stmt_close($stmt);
          mysqli_close($mysqli);
        }else{
          // Display error alert window
          echo '<script>alert("Error occurred during insertion. Please try again.")</script>';
        }
      }
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
        <li><a href="../menu/Main1.php">Distributor</a></li>
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
    <h2 id='title'>Modify movie information</h2> 
        <p><B>🖋 Please modify the movie information.</B></p>
        <form action="Main5_update.php?state=updated&&key=<?php echo $key;?>&&name=<?php echo $name;?>" method="post">
        <p><B style="font-size:20px; margin-left:7px;margin-right:92px">*Title  </B><input class="inputText" name="new_title" type="text" value='<?php echo $name;?>'></P>
        <p><B style="font-size:20px; margin-right:80px; margin-left:15px">Genre </B> 
        <?php
        echo '<select name="new_genre">';
        echo "<option value='NULL'>입력 안함";
        $sql = "SELECT * FROM genre";
        $res = mysqli_query($mysqli,$sql);
        if($res){
          while($newArray = mysqli_fetch_array($res,MYSQLI_ASSOC)){
            $id = $newArray['genre_id'];
            $value = $newArray['genre_name'];
            printf("<option value='%s'>%s",$id,$value);
          }
          mysqli_free_result($res);
        }
       echo '</select></p>';

       echo '<p><B style="font-size:20px; margin-right:50px; margin-left:15px">Category </B>';
       echo '<select name="new_category">';
       echo "<option value='NULL'>입력 안함";
       $sql = "SELECT * FROM category";
       $res = mysqli_query($mysqli,$sql);
       if($res){
         while($newArray = mysqli_fetch_array($res,MYSQLI_ASSOC)){
           $id = $newArray['category_id'];
           $value = $newArray['category_name'];
           printf("<option value='%s'>%s",$id,$value);
         }
         mysqli_free_result($res);
       }
      echo '</select></p>';

      echo '<p><B style="font-size:20px; margin-right:33px; margin-left:15px">Distributor </B>';
       echo '<select name="new_distributor">';
       echo "<option value='NULL'>입력 안함";
       $sql = "SELECT * FROM distributor";
       $res = mysqli_query($mysqli,$sql);
       if($res){
         while($newArray = mysqli_fetch_array($res,MYSQLI_ASSOC)){
           $id = $newArray['distributor_id'];
           $value = $newArray['distributor_name'];
           printf("<option value='%s'>%s",$id,$value);
         }
         mysqli_free_result($res);
       }
      echo '</select></p>'; 
      echo '<p><B style="font-size:20px; margin-right:59px; margin-left:15px">Country </B><input class="inputText" name="new_country" type="text"></P>';
      echo '<B style="font-size:20px; margin-right:8px">*Released Date </B>'; 
      echo '<select class="datebox" name="new_year">';
          $i=-1;
          while($i<40){
            $i = $i+1;
            printf("<option value='%s'>%s",(int)$year-(int)$i,(int)$year-(int)$i);
          }
          echo '</select><B style="font-size:20px;margin-right:5px"> 년    </B>';
          echo '<select class="datebox" name="new_month">';
          $month=0;
          while($month<12){
            $month = $month+1;
            printf("<option value='%02s'>%02s",$month,$month);
          }
          echo '</select><B style="font-size:20px;margin-right:5px"> 월    </B>';
          echo '<select class="datebox" name="new_day">';
          $day=0;
          while($day<31){
            $day = $day+1;
            printf("<option value='%02s'>%02s",$day,$day);
          }
          echo '</select><B style="font-size:20px"> 일</B>';
          ?>
       <p><B style="font-size:20px; margin-right:30px; margin-left:15px">Film Rating</B> 
        <select name="new_film_rating">
        <option value="NULL" selected>입력 안함
         <option value="전체관람가">전체 관람가 
         <option value="12세이상관람가">12세 이상 관람가
         <option value="15세이상관람가">15세 이상 관람가
         <option value="청소년관람불가">청소년 관람불가
       </select></P>
       <input class="add" type="submit" value="modify">
   </form>
    </div>
</section>
<footer id="downdeco">
      Team 11 | Grand Data <br>
      JeongHyeon Lee, Minjung Jung, Minso Kwak, Suhyeon Choi
    </footer>
</body >
</html> 
