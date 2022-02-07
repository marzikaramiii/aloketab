
<?php
session_start();
$_SESSION['type']="public";
$_SESSION['userid']=$_GET['id'];
$_SESSION['gender']=0;
$_SESSION['login']=true;

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>aloketab</title>
</head>

<body>
	<style>
		  @font-face
		{
font-family:'b yekan';
src:url(../fonts/Yekan.eot)format('eot'),
	url(../fonts/Yekan.ttf)format('ttf'),
    url('../fonts/Yekan.ttf') format('truetype');
	   
            }
		body{
			background-color: rgba(0,0,0,.03);
			
		}
		.body{
			width:400px;
			height:100%;
			margin:40px auto;
			
			font-family:'b yekan';
			direction:rtl;
			text-align: center;
			
		}
		.logo{
		max-width:300px;
		max-height:80px;
				
		}
		.form{
			width: 100%;
			background:white;border:1px solid #d1d1d1;
			margin-top:15px;
			padding:13px 2px;
			
			
			
			
		}
		h3{
			margin:8px;
			border-bottom:1px solid #d1d1d1;
			font-weight: normal;
		}
		form{
			text-align: right;
			padding:5px 15px;
		}
		input{
			width:95%;
			height:15px;
			border:1px solid #d1d1d1;
			border-radius:4px;
			padding: 10px;
			color: #4B4A4A;
			margin-top: 10px;
			text-align:left;
			fonrt-size:20px;
	
			
		}
		.row{
		margin-top:20px;	
		}
		input['password']{
			position:relative;
		}
		.password{
			text-align:right;
			background-image: url(../pic/password.png);
			background-repeat: no-repeat;
			width: 24px;
			height: 24px;
			display: inline-block;
			position: absolute;
			top:16px;
			right:8px;
		}
		.check{
			display:inline-block;
			width: 15px;
			height:15px;
			margin-top: 15px;
			border:1px solid #d1d1d1;
			border-radius:4px;
			position:relative;
			top:5px;
		}
		.under{
			color:#ff9933;
			border-bottom:2px dotted #ff9933;
		}
		a
		{
			text-decoration: none;
		}
		
		.tick
		{
			width:64px;
			height: 64px;
			display: inline-block;
			background-image: url(../pic/tick.png);
			z-index: 5;
			position: relative;
			margin-top: 20px;
		}
	</style>
	<div class="body">
	<img src="../pic/BOOOOK-3.png" class="logo">
		
		<div class="form" >
		<h3 style="font-weight: normal">به الو کتاب خوش آمدید</h3>
		
			<img src="../pic/tick.png" class="tick">
		
			<style>
				.button{
					background: white;
					color:#ff9933;
					padding:5px 15px;
					text-align: center;
					border-radius:4px;
					margin-top: 10px;
					cursor: pointer;
					width:85%;
					height: 20px;
					font-family:'b yekan';
					border:1px solid #ff9933;
					font-size: 15px;
					display: block;
					margin: 0 auto;
				}
				.button:hover{
					background:#ff9933;
					color: white;
				}
			</style>
			<div style="margin:0 12px;">

			<p>حساب کاربری شما در الو کتاب  ساخته شد</p>
			<p style="text-align: justify">
			اکنون می‌توانید به صفحه‌ای که در آن بودید بازگردید و یا با تکمیل اطلاعات حساب کاربری خود به کلیه امکانات و سرویس‌های الوکتاب و سرویس‌های وابسته به آن دسترسی داشته باشید</p>
			</div>
            <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
            ?>
		     <a href="takmil.php?id=<?php  echo $id?>"><span class="button">تکمیل اطلاعات</span></a>
			<a href="login.php"><span class="under">بازگشت به صفحه ای که در آن بودید</span></a>
		</div>
	</div>
	<style>
		footer{
			font-family:'b yekan';
			text-align: center;
			direction: rtl;
			
		}
		footer div{
			color:#747474;
			
		}
		.foot{
			direction: rtl;
			color:#747474;
			text-align:center;
			font-family:'b yekan';
			padding:0;
			border-bottom:1px solid #d1d1d1;
		}
		.foot li{
			display: inline-block;
			margin:8px;
			
		}
		.foot li:hover{
			color:#ff9933;
			cursor:pointer;
		}
	</style>
	<footer>
	<ul class="foot">
		<li>درباره الو کتاب</li>
		<li>فرصت های شغلی</li>
		<li>تماس با ما</li>
		<li>همکاری با سازمان ها</li>
		
		</ul>
		<div >استفاده از مطالب فروشگاه اینترنتی الو کتاب فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به شرکت الوکتاب  می‌باشد.</div>
	</footer>
</body>
</html>