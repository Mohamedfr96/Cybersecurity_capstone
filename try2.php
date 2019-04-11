<?php
    $link = mysqli_connect("localhost","root","","messaging system");
    if (mysqli_connect_error()) {
    die("Could not connect to database");
    }
    $query = "SELECT * FROM message WHERE ID ='{$_GET['id']}'  ";
    $result=mysqli_query($link, $query);
    $resultArray = $result->fetch_all(MYSQLI_ASSOC);
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
<div class="wrap">
    <a href="try1.php"> back to inbox</a>  
    <table class="form1">
        <?php
        foreach ($resultArray as $key => $val) {
            echo"
            <tr>
                <td> Subject : ".$val['M_Subject']." </td>
                <td> From : ".$val['M_From']." </td>
            </tr>
        </table>
        <pre> ".$val['Message']."  </pre>
        ";
        }
?>
    
    
</div>
 </body>