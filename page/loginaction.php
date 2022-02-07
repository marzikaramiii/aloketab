<?php

include ("connect.php");
session_start();
 if (isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['password']) && !empty($_POST['password']))
 {
     $email=$_POST['email'];
     $password=$_POST['password'];
 }
 else
 {
     exit("fields are empty");
 }

 $sql="select * from users WHERE email='$email' AND password='$password'";
mysqli_query($link,"SET NAMES utf8");
  $result=mysqli_query($link,$sql);

  if($row=mysqli_fetch_array($result)) {
      $_SESSION['login'] = true;
      $_SESSION['realname'] = $row['realname'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['mobile'] = $row['mobile'];
      $_SESSION['userid'] = $row['id'];
      $_SESSION['gender'] = $row['gender'];

      if ($row['type'] == 1) {
          $_SESSION['type']="admin";
          ?>
          <script>
              location.replace("panel.php?id=<?=$_SESSION['userid']?>");

          </script>
          <?php
      } else if($row['type']==0){
          $_SESSION['type']="public";
          ?>

          <script>
              location.replace("index.php");
          </script>
          <?php
      }
  }
  else {


      ?>
      <script>
          location.replace("register.php");
      </script>
      <?php
  }
      ?>