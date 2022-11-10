<!DOCTYPE html>
<style>
  #list_table{
    text-align:center; 
    margin-left:auto;
    margin-right:auto;
  }
  #insert{
    width: 180px;
    height: 40px;
    font-size: medium;
    padding: 5px;
    border-radius: 10px;
    font-weight: 700;
    background-color: #000;
    color:#ffffff;
    margin-top:5px;
		margin-bottom:5px
  }
  .list_tr{
    font-size:20px; 
    font-weight:700; 
    height:70px; 
    cursor:pointer;
  }
  .normal_tr{
    height:40px; 
    font-weight:700;
    cursor:pointer;
  }
  .input_box{
    width:180px;
    height:20px;
    font-size:12px;
    margin-left:3px;
		margin-right:3px;
		margin-top:3px;
		margin-bottom:3px
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
        <li><a href="../menu/Main2.html">main1</a></li>
        <li><a href="../menu/Main3.html">main3</a></li>
        <li><a href="../menu/Main4.html">main4</a></li>
        <li><a href="../menu/Main5.html">main5</a></li>
        <li><a href="../menu/Main6.html">main6</a></li>
        <li><a href="../menu/Main7.php">main7</a></li>
      </ul>
    </nav>

    <section>
        
    <p>

    <div id = "contents">
    <h2 id = "title">Theater</h2>

      <?php
$mysqli = mysqli_connect("localhost", "team11", "team11", "team11");

if(mysqli_connect_errno()){
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
else{
    $sql1 = "INSERT INTO Theater(theater_name, branch, hall_num, seat_num) values(\"".$_POST["theater_name"]."\", \"".$_POST["branch"]."\", ".$_POST["hall_num"].", ".$_POST["seat_num"].")";
    $res1 = mysqli_query($mysqli, $sql1);
    if ($res1 === TRUE) {
        $sql2 = "SELECT MAX(theater_id) AS theater_id FROM Theater";
        $res2 = mysqli_query($mysqli, $sql2);
        $newArray = mysqli_fetch_array($res2, MYSQLI_ASSOC);

        $sql3 = "INSERT INTO Theater_Address(theater_id, city, district) values(\"".$newArray["theater_id"]."\", \"".$_POST["city"]."\", \"".$_POST["district"]."\")";
        $res3 = mysqli_query($mysqli, $sql3);

        if ($res3==TRUE) {
            echo "Insertion Successful.";
        } else {
            printf("Could not insert record: %s\n",mysqli_error($mysqli));
        }
    } else {
        printf("Could not insert record: %s\n",mysqli_error($mysqli));
    }
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