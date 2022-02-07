<?php
session_start();
include "connect.php";
$bookid=$_POST['id'];
  $query="select * from sabadkharid WHERE userid='{$_SESSION['userid']}' and bookid='$bookid' and states='0'";
  $result=mysqli_query($link,$query);
  $row=mysqli_fetch_array($result);
  if($row)
  {
      $sql2="update sabadkharid set qty=qty+1 WHERE userid='{$_SESSION['userid']}' and bookid='$bookid' AND states='0'";
      if(mysqli_query($link,$sql2))
      {
          echo 1;
      }
      else
      {
          echo 0;
      }
  }
  else {
      $query = "insert into sabadkharid VALUES ('{$_SESSION['userid']}','$bookid','1','0')";
      if (mysqli_query($link, $query)) {
          echo 1;
      } else {
          echo 0;
      }
  }


?>