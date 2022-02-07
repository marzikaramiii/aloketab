<?php

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>پنل کاربری</title>
	<link href="../file/css/panel.css" rel="stylesheet" type="text/css">
	<script src="../file/js/panel.js" type="text/javascript"></script>

  
</head>

<body dir="rtl">
	<div id="menu">
		
     <div id="user">
		<img src="../pic/menu.png" id="iconmenu" onClick="opennav()">

		 <img src="../pic/girl.png" class="profile">

		 <span></span>
		 
		</div>
		<center>
		 کتابخانه 
		 </center>
		<div id="search">
		<input type="text" name="search" id="search2" placeholder="جست و جو کنید...">
			<span class="icon"></span>
		</div>
	</div>
	<div id="content">
	<aside>
		<img src="../pic/girl.png">
		<ul>
		<li></li>
		<li><?php  if(isset($_SESSION['email'])){echo $_SESSION['email'];}?></li>
		<li><?=$_SESSION['realname']?></li>

		<li>
			<a href="#">
                <?php

                include "connect.php";
                if(isset($_SESSION['type'])&& $_SESSION['type']=="public")
                {
                $sql = "select count(qty) as kolkharid  from sabadkharid where states='1' and userid='{$_SESSION['userid']}'";
                $result = mysqli_query($link, $sql);

                $row = mysqli_fetch_array($result);
                if ($row) {
                    $kolkharid = $row['kolkharid'];
                } else {
                    $kolkharid = 0;
                }
                ?>
                <span class="name">کتاب های خریداری شده:</span>
                <?= $kolkharid ?>
            </a>


            <li>
                <a href="panel.php">
                    <img src="../pic/arrow right.png" class="arrow"/>

                    کتابخانه
                </a>
            </li>
            <li>
                <a href="sabtketab.php">
                    <img src="../pic/arrow right.png" class="arrow"/>
                    فروش کتاب
                </a>
            </li>

            <li>
                <a href="cart.php">
                    <img src="../pic/arrow right.png" class="arrow"/>
                    سبد خرید
                </a>
            </li>
            <?php
            }
            ?>
			<li>
                <?php
                include ("connect.php");
                    if (isset($_SESSION['userid']))
                    {
                        $id=$_SESSION['userid'];
                    }
                ?>
				<a href="takmil.php?id=<?php  echo $id?>">
			<img src="../pic/arrow right.png" class="arrow"/>
				
			ویرایش مشخصات
			</a>
			</li>

            <?php
            if(isset($_SESSION['type']) && $_SESSION['type']=="admin") {
                ?>
                <li>
                    <a href="bookmanagement.php?id=<?=$id?>">
                        <img src="../pic/arrow%20right.png" class="arrow"/>

                       مدیریت کتاب ها
                    </a>
                </li>

                <?php
            }
            ?>













            <li>
                <a href="index.php">
                    <img src="../pic/arrow right.png" class="arrow"/>

                    صفحه اصلی
                </a>
            </li>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			
			<li>
				<a href="logout.php">
			<img src="../pic/logout.png" class="arrow"/>
				
			خروج از حساب کاربری
			</a>
					</li>
			
		</ul>
		</aside>
		<section>