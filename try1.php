<?php
  function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
  session_start();
   $x=$_SESSION['email'];
   $y=$_SESSION['UserID'];
$link = mysqli_connect("localhost","root","","messaging system");
if (mysqli_connect_error()) {
die("Could not connect to database");
}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
 <head>
    <meta charset="utf-8">
    <title>mailBOX</title>
      <link type="text/css" rel="stylesheet" href="sendsty.css">
  <link type="text/css" rel="stylesheet" href="navsty.css">

    </head>
 <body>

  <?php

// if(isset($_GET['messsage'])){
  $M_From = $_SESSION['email'];
// $id = $_GET['messsage'];
// var_dump($id);
$query = "SELECT * FROM message WHERE M_From !='$M_From' ORDER BY timeStamp ";
$result=mysqli_query($link, $query);
$resultArray = $result->fetch_all(MYSQLI_ASSOC);
//$mes = mysql_query("SELECT * FROM message WHERE ID ='$id'");
// $row=mysqli_fetch_array($result);
// $from = $row["M_From"];
// $subject = $row["M_Subject"];
// $message = $row["Message"];
// $time = $row["timeStamp"];
?>
 	<header>
   <a id="logo" href="#">OP</a>
  <nav>
    <ul>
      <li><a href="send.php">SEND</a></li>
      
      <li><a href="try1.php">inbox</a></li>
      
      <li><a href="logoutproc.php">logout</a></li>
      
    </ul>
  </nav>
</header>
<div class="wrap">
  
<table class="form1">
  <tr>
    <th>From</th>
    <th>Subject</th>
    <th>Time</th>
  <tr>
  <?php
  foreach ($resultArray as $val) {
    echo"<tr>
    <td>   ".   $val['M_From']  ."  </td>
    <td> <a href=\"try2.php?id=".$val['ID']."\" >". $val['M_Subject'] ."</a> </td>
    <td>  ".  time_elapsed_string($val['timeStamp'])." </td>
    </tr>";
  }
  ?>

</table>


<?php exit(); ?>

  

      
  
<div  id= "back" class="wrap">
	<form action="" method="post">
<?php


echo '<table class="form1">
       <tr>
       <th>from</th>
       <th>subject</th>
       <th>id</th>
       </tr>';
    //   $query = mysql_query("SELECT * FROM message WHERE M_To='$x' ");{


$query = "SELECT * FROM message WHERE UserID='$y' ";
if ($result=mysqli_query($link, $query)) {

  while($row=mysqli_fetch_array($result)){
$from = $row["M_From"];
$subject = $row["M_Subject"];
$message = $row["Message"];
$id= $row["ID"];
       echo ' <tr>';
       echo ' <td>'.$from.'</td>';
       echo ' <td><a href="?messsage='.$id.'">'.$subject.'</a></td>';
       echo '<td>'.$id.'</td>'; 
       echo ' </tr>';
}
echo '</table>';
}
 else {
echo "It failed";
}

?>
</form>
</div>

</body>


</html>