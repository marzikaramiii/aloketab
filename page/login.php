
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ورود</title>
    <script src="../file/js/jquery-3.4.1.min.js"></script>
</head>

<body>
	<script type="text/javascript">
	 function check2()
		{

			var password=document.getElementById("password").value;
			var email=document.getElementById("email").value;
			var error=document.getElementById("error");

			var msg="";
			var flag=true;
			if(password.length<8)
				{

					msg+="تعداد ارقام پسورد باید از 8 تا بیشتر باشد"+"<br/>";
					error.innerHTML=msg;
					flag=false;


				}
			if(password=="" || email=="")
				{
					msg+="فیلد ها خالی است"+"<br/>";
					flag=false;
				}



			if(flag==true)
				{
					document.register.submit();
				}
			else{
				error.innerHTML=msg;
			}


		}

	</script>
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
			text-align: center;
			font-family:'b yekan';
			direction:rtl;
			
		}
		.logo{
		max-width:300px;
		max-height:80px;
				
		}
		.form{
			width: 100%;
			background:white;border:1px solid #d1d1d1;
			margin-top:15px;
			
			
			
			
		}
		h3{
			margin:8px;
			border-bottom:1px solid #d1d1d1;
			font-weight: normal;
		}
		form{
			text-align: right;
			padding:5px 10px;
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
	</style>
	<div class="body">
	<img src="../pic/BOOOOK-3.png" class="logo">
		
		<div class="form" >
		<h3 style="font-weight: normal">ورود به الو کتاب </h3>
		<form action="loginaction.php" method="post" name="register">
			<div >
			<label>
			آدرس ایمیل:
			</label>
			<br/>
			<input type="email" placeholder="youremail@gmail.com" name="email" id="email">
				</div>
			<div class="row"></div>
			<label>
			رمز عبور:
			</label>
			<br/>
			<div style="position:relative;">
			<input type="password" name="password" id="password">
			<span class="password"></span>
			</div>
			<!--<input type="checkbox" class="check" style="display:inline-block;" checked/>

			<label style="color:#848484;font-size:15px;">
				<span class="under">حریم خصوصی</span>
				و
				<span class="under">شرایط و قوانین</span>
				استفاده از سرویس های سایت الوکتاب را مطالعه نموده و با کلیه موارد آن موافقم.</label>
				-->
			<style>
				.button{
					background: #ff9933;
					color:white;
					padding:5px 15px;
					text-align: center;
					border-radius:4px;
					margin-top: 10px;
					cursor: pointer;
					width:380px;
					height: 40px;
					font-family:'b yekan';
					border:1px solid #ff9933;
					font-size: 15px;
				}
			</style>
			<button class="button" onClick="check2()" type="button">
			ورود
			</button>
			
			</form>
			<div id="error" style="color:red;"></div>
			<h3 style="border:none;font-size:15px;display: inline-block;">
			کاربر جدید هستید؟
			</h3>
			<a href="register.php" style="text-decoration: none;"><span class="under">ثبت نام در الوکتاب</span></a>
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
