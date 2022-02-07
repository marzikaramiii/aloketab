<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>نویسندگان</title>
<link href="../file/css/writer.css" rel="stylesheet" type="text/css">
	<link href="../file/css/footer.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="main" style="margin: 0;">
<img class="pic1" src="../pic/BOOOOK-3.png" width="70" height="30" alt=""/>
	<header>
		<ul class="a">
			<li>نویسندگان</li>
			<li class="b"><a href="index.php">صفحه اصلی</a></li>
		  
        </ul>
       
	</header>
	<div id="search2">
		<span class="iconsearch"></span>
		<input type="text" placeholder="جستجوی نویسندگان">
		
		
	</div>

		<style>
		.content
			{
				width: 1200px;
				margin: 0 auto;
            margin-bottom: 15px;
			}
			.card{
				width: 330px;

				border: 1px solid #d1d1d1;
				display:inline-block;
				margin:10px 15px;
				text-align: center;
                padding-bottom: 10px;
			}
			.image{
				width: 100%;
				height: 125px;
				position: relative;
			}
			.image img
			{
				width:100%;
				height:100%;
			}
			.image::after
			{
				content: "";
				width: 100%;
				height:100%;
				background-color: rgba(0,0,0,0.4);
				position: absolute;
				top:0;
				left:0;
			}


			.card-contet
			
			{
				width: 100%;
				height: 100px;
				text-align: center;
				direction:rtl; 
			}
			.card-contet p
			{
				margin: 0.5px;
				padding:0 10px;
				font-size: 10pt;
				
				
			}
			 .more
			{
				width: 100px;
				height: 20px;
				border:1px solid #ff9933;
				padding:5px;
				
				display: inline-block;
				vertical-align: middle;
				line-height: 18px;
				color:#ff9933;
			}
			.more:hover
			{
				background-color: #ff9933;
				color: white;
				cursor: pointer;
			}
            .cards
            {
                text-align: left;
            }
		</style>
		<div class="content">
            <div class="cards">
            <?php
            include "connect.php";
            $sql="select * from author";
            $result=mysqli_query($link,$sql);
            while ($row=mysqli_fetch_array($result)) {
                ?>
                <div class="card">
                    <div class="image">
                        <img width="100%" src="../pic/author/<?=$row['image']?>">
                        <span class="writer-image">
			</span>
                    </div>

                    <div class="card-contet">
                        <p style="color: #ff9933;font-size: 16px;"><?=$row['name']?></p>
                        <p><?=substr($row['details'],0,205)."...."?></p>

                    </div>
                    <a href="details.php?id=<?=$row['id']?>"><span class="more">بیشتر بخوانید</span></a>


                </div>
                <?php
            }
            ?>
        </div>
        </div>
</div>
	<?php
		include('footer.php');
		?>
     <style>
		footer
		 {
			 clear: both;
		 }
		 .footer2
		 {
			 height: 43px;
		 }
		
		
		</style>
