
<!DOCTYPE html>
<script>
  //input error control
  function check_inputerr(){
    var new_title = document.forms["insert_form"]["new_title"].value;
    var new_year = document.forms["insert_form"]["new_year"].value;
    var new_month = document.forms["insert_form"]["new_month"].value;
    var new_day = document.forms["insert_form"]["new_day"].value;
    // If you didn't enter a title,
    if (new_title.trim() == ""){
      alert("Please enter the title of the movie.");
      return false; 
    }
    //If you select the invalid date, 
    else if(new Date(new_year,new_month,0).getDate()<new_day){
      alert("Please enter a valid date.");
      return false;
    }
    //Go to insert url 
    else{
      return true;
    }
  }
  //Ask the user one more time if they really want to delete the movie
  function check_delete(movie_id){
    var delete_confirm =confirm("Are you sure you want to delete this movie?");
    if(delete_confirm){
      const url = new URLSearchParams(location.search);
      //Change state parameter to "deleted"
      url.set('state',"deleted");
      const newUrl = url.toString();
      location.href=window.location.pathname+"?"+newUrl+"&&key="+movie_id;
    }
  }
</script>
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
  .line {
  width : 50%;
  height : 50px;
  }
</style>
<html>
    <?php 
      $name = $_GET['director_name'];
      $id = $_GET['director_id'];
      // Set the default value of the menu parameter to 0
      $menu = $_GET['state']=="result" ? $_POST['menu'] : "0";
      // Current year
      $year = date("Y");
      // Create Connection
      $mysqli=mysqli_connect("localhost","team11", "team11","team11");

      if($mysqli === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }
      // If the page moves to insert url,
      if($_GET['state']=="inserted"){
        $link=mysqli_connect("localhost","team11", "team11","team11");
        $sql = "INSERT INTO MOVIE (genre_id, category_id, distributor_id, director_id, movie_name, country, released_date, film_rating) VALUES (?,?,?,?,?,?,?,?);";
        if($stmt=mysqli_prepare($link,$sql)){
          mysqli_stmt_bind_param($stmt,"iiiissss",$genre_id,$category_id,$distributor_id,$director_id,$movie_name,$country,$released_date,$film_rating);
          $genre_id = $_POST['new_genre']=="NULL"?NULL:(int)$_POST['new_genre'];
          $category_id= $_POST['new_category']=="NULL"?NULL:(int)$_POST['new_category'];
          $distributor_id= $_POST['new_distributor']=="NULL"?NULL:(int)$_POST['new_distributor'];
          $director_id= (int)$id;
          $movie_name= $_POST['new_title'];
          $country= $_POST['new_country'];
          $new_year= $_POST['new_year'];
          $new_month= $_POST['new_month'];
          $new_day= $_POST['new_day'];
          $released_date = $new_year."-".$new_month."-".$new_day;
          $film_rating= $_POST['new_film_rating'];
          mysqli_stmt_execute($stmt); 
          mysqli_stmt_close($stmt);

          echo '<script>alert("Insert Successfully.")</script>';
          // Return to previous page after insert
          printf('<script>location.href="Main5_detail.php?director_id=%s&&director_name=%s&&state=search";</script>',$id,$name);
        }else{
          // Display error alert window
          echo '<script>alert("Error occurred during insertion. Please try again.")</script>';
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
      }
      // If the page moves to delete url,
      if($_GET['state']=="deleted"){
        $link=mysqli_connect("localhost","team11", "team11","team11");
        $sql = "DELETE FROM movie WHERE movie_id=".$_GET['key'];
        $res = mysqli_query($link,$sql);
        if($res){
          echo '<script>alert("Delete Successfully.");</script>';
          // Return to previous page after delete
          printf('<script>location.href="Main5_detail.php?director_id=%s&&director_name=%s&&state=search";</script>',$id,$name);
        }else{
          // Display error alert window
          echo '<script>alert("Error occurred during deletion. Please try again.");</script>';
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
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
      <!-- director name -->
    <h2 id='title'><?php echo $name;?></h2> 
    <!-- page description -->
    <p>This is the page of the director <?php echo $name;?>.
    <br>You can search for an analysis of the director's filmography.
    <br><B>Please select the category where you want to receive the analysis.</B></p>
    <!-- menu dropdown -->
    <form name="menu_form" action="Main5_detail.php?director_id=<?php echo $id;?>&&director_name=<?php echo $name;?>&&state=result" method="post" style="margin-bottom:5%">
       <select name="menu">
         <option value="0" selected>Movie List 
         <option value="1">Screening Number
         <option value="2">Spectator
         <option value="3">Sales
       </select>
       <input class="search" type="submit" value="search"></form>
    <form name="insert_form" action="Main5_detail.php?director_id=<?php echo $id;?>&&director_name=<?php echo $name;?>&&state=inserted" onsubmit="return check_inputerr()" method="post" style="margin-bottom:5%">
        <!-- movie input box -->
        <p><B>🖋 Please add a new movie produced by <?php echo $name;?>.</B></p>
        
        <p><B style="font-size:20px; margin-left:7px;margin-right:92px">*Title  </B><input class="inputText" name="new_title" type="text"></P>
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
       <input class="add" type="submit" value="add movie"></form>
        
   </form>
  <hr id="line" />
      <?php
            if($menu=='1'){
                $sql = "SELECT AVG(screen_num) as c1, MAX(screen_num) as c2 FROM movie JOIN screening_info USING(movie_id) JOIN director USING(director_id) WHERE director_id=".$_GET['director_id']." GROUP BY director_id";
                $title = "🎞 Screening Number 🎞";
                $head = "<tr class='head_tr'><th>Average</th><th>Max</th></tr>";
              } else if($menu=='2') {
                $sql = "SELECT AVG(spectator_total) as c1, AVG(spectator_seoul) as c3, MAX(spectator_total) as c2, MAX(spectator_seoul) as c4 FROM movie JOIN spectator USING(movie_id) JOIN director USING(director_id) WHERE director_id=".$_GET['director_id']." GROUP BY director_id";
                $title = "🎞 Spectator Number 🎞";
                $head = "<tr class='head_tr'><th colspan='2'>Total</th><th colspan='2'>Seoul</th></tr><tr class='head_tr'><th>Average</th><th>Max</th><th>Average</th><th>Max</th</tr>";
              }else if($menu=='3') {
                $sql = "SELECT AVG(sales_total) as c1, AVG(sales_seoul) as c3, MAX(sales_total) as c2, MAX(sales_seoul) as c4 FROM movie JOIN sales USING(movie_id) JOIN director USING(director_id) WHERE director_id=".$_GET['director_id']." GROUP BY director_id";
                $title = "🎞 Sales of Films 🎞";
                $head = "<tr class='head_tr'><th colspan='2'>Total</th><th colspan='2'>Seoul</th></tr><tr class='head_tr'><th>Average</th><th>Max</th><th>Average</th><th>Max</th</tr>";
              }else{
                $sql = "SELECT movie_id, movie_name as c1, released_date as c2 FROM movie JOIN director USING(director_id) WHERE director_id=".$_GET['director_id']." ORDER BY released_date DESC";
                $title = "🎞 List of Films 🎞";
                $head = "<tr class='head_tr'><th>Title</th><th>Released Date</th></tr>";
              }
            $res = mysqli_query($mysqli,$sql);
            $director_list = mysqli_fetch_array($res,MYSQLI_ASSOC);
            if($res){
                printf("<h2 class='toCenter'>%s</h2>",$title);
                printf("<table class=\"toCenter\">%s",$head);
                $i=0;
                    do{
                      $c1 = $director_list["c1"];
                      $c2 = $director_list["c2"];
                      if($menu=='0'){
                        $del_button ="<th onclick='return check_delete(".$director_list["movie_id"].")'><svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                        <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                      </svg></th><td onclick=\"location.href='Main5_update.php?key=".$director_list["movie_id"]."&&name=".$c1."&&state=write'\"><svg xmlns='http://www.w3.org/2000/svg' style='margin-left:20px;' width='18' height='18' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                      <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                    </svg></td>";
                      }
                      else{
                        $del_button="";
                      }
                      printf("<tr class=\"normal_tr\"><td style=\"width:400px\"><B> %s </B></td><td style=\"width:400px\"> %s </td>%s",$c1, $c2,$del_button);
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
            mysqli_free_result($res);
            mysqli_close($mysqli);
        
        ?>
    </div>
</section>
<footer id="downdeco">
      Team 11 | Grand Data <br>
      JeongHyeon Lee, Minjung Jung, Minso Fwak, Suhyeon Choe
    </footer>
</body >
</html> 