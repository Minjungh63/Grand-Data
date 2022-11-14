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
    <h2 id = "title">Festival Information Updated</h2>

      <?php
$mysqli = mysqli_connect("localhost", "team11", "team11", "team11");

if(mysqli_connect_errno()){
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
else{
    if($_POST['festival_name'] != NULL){
        $sql = "UPDATE Festival SET festival_name=\"".$_POST["festival_name"]."\" WHERE festival_id=".$_GET["festival_id"]."";
        $res = mysqli_query($mysqli, $sql);
        if ($res) {
            echo "'Name' is updated.<br>";
        } else {
            printf("Could not update record: %s\n",mysqli_error($mysqli));
        }
    }
    if($_POST['category_id'] != 11){
        $sql = "UPDATE Festival SET category_id=\"".$_POST["category_id"]."\" WHERE festival_id=".$_GET["festival_id"]."";
        $res = mysqli_query($mysqli, $sql);
        if ($res) {
            echo "'Category' is updated.<br>";
        } else {
            printf("Could not update record: %s\n",mysqli_error($mysqli));
        }
    }
    if($_POST['continent'] != NULL){
        $sql = "UPDATE Festival SET continent=\"".$_POST["continent"]."\" WHERE festival_id=".$_GET["festival_id"]."";
        $res = mysqli_query($mysqli, $sql);
        if ($res) {
            echo "'Continent' is updated.<br>";
        } else {
            printf("Could not update record: %s\n",mysqli_error($mysqli));
        }
    }
    if($_POST['country'] != NULL){
        $sql = "UPDATE Festival SET country=\"".$_POST["country"]."\" WHERE festival_id=".$_GET["festival_id"]."";
        $res = mysqli_query($mysqli, $sql);
        if ($res) {
            echo "'Country' is updated.<br>";
        } else {
            printf("Could not update record: %s\n",mysqli_error($mysqli));
        }
    }
    if($_POST['city'] != NULL){
        $sql = "UPDATE Festival SET city=\"".$_POST["city"]."\" WHERE festival_id=".$_GET["festival_id"]."";
        $res = mysqli_query($mysqli, $sql);
        if ($res) {
            echo "'City' is updated.<br>";
        } else {
            printf("Could not update record: %s\n",mysqli_error($mysqli));
        }
    }
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