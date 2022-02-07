

<?php
session_start();

include ("connect.php");
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    $_SESSION['iduser']=$_GET['id'];
    $_SESSION['login']=true;
}
$username=$codemeli=$mobile=$cartcode=$name=$family="";
$query = "select * from users WHERE id='$id'";
mysqli_query($link,"SET NAMES utf8");
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
if($row) {

    $_SESSION['email'] = $row['email'];
    $_SESSION['password']=$row['password'];
    $username = $row['username'];
    $codemeli = $row['codemeli'];
    $mobile = $row['mobile'];
    $cartcode = $row['cartcode'];
    $gender=$row['gender'];
    $name=$row['name'];
    $family=$row['family'];
    $realname=$row['realname'];
    $_SESSION['realname']=$realname;
    $_SESSION['gender']=$gender;

}
include('panel_menu.php');
?>
<script>
function sabt2()
	{
		var name=document.getElementById("name").value;
		var family=document.getElementById("family").value;
		var kod=document.getElementById("kod").value;
		var mobile=document.getElementById("mobile").value;
		var email=document.getElementById("email").value;
		var cart=document.getElementById("cart").value;
		var error=document.getElementById("error");
		var msg="";
		var flag=true;
		if(name=="")
			{
				msg+="فیلد نام خالی است"+"<br/>";
				flag=false;
			}
		if(family=="")
			{
				msg+="فیلد نام خانوادگی خالی است"+"<br/>";
				flag=false;
			}
		if(kod=="")
			{
				msg+="فیلد شماره ملی خالی است"+"<br/>";
				flag=false;
			}
		if(kod.length!=10)
			{
				msg+="کد ملی را درست وارد نمایید"+"<br/>";
				flag=false;
			}
		if(mobile=="")
			{
				msg+="فیلد موبایل خالی است"+"<br/>";
				flag=false;
			}
		if(mobile.length!=11)
			{
				msg+="شماره تلفن را درست وارد نمایید"+"<br/>";
				flag=false;
			}
		if(cart=="")
			{
				msg+="فیلد شماره کارت خالی است"+"<br/>";
				flag=false;
			}
		if(cart.length!=16)
			{
				msg+="شماره کارت را درست وارد نمایید"+"<br/>";
				flag=false;
			}
		if(flag==true)
			{
				document.sabt.submit();
			}
		else
			{
				error.innerHTML=msg;
			}
		
	}

</script>
<style> 

		.logo{
		max-width:300px;
		max-height:80px;
				
		}
		.form{
			width:50%;
			background:white;border:1px solid #d1d1d1;
			margin:50px auto;
			text-align: center;
			
			
			
			
			
			
		}
		h3{
			margin:8px;
			border-bottom:1px solid #d1d1d1;
			font-weight: normal;
		}
		form{
			text-align: right;
			padding:5px 10px;
			margin: 0 auto;
		}
		input[type="text"]{
			width:88%;
			height:15px;
			border:1px solid #d1d1d1;
			border-radius:4px;
			padding: 10px;
			color: #4B4A4A;
			margin-top: 10px;
			text-align:right;
			
			font-family:'b yekan';
	
			
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
	<div class="form" >
		<h3 style="font-weight: normal">حساب شخصی</h3>

		<form action="sabt.php?id=<?=$id?>" method="post" name="sabt">
			<div >
			<label>
			نام:
			</label>
			
			<input type="text" placeholder="نام خود را وارد کنید" name="name" id="name"
            value="<?=$name?>">
		  </div>
			<div class="row"></div>
			
			<label>
			نام خانوادگی:
			</label>
		  <input type="text" placeholder="نام  خانوادگی خود را وارد کنید" name="family" id="family" style="width:79%;" value="<?=$family?>">
            <div class="row"></div>
            <label>
                نام کاربری:
            </label>
            <input type="text" placeholder="نام  کاربری خود را وارد کنید" name="username" id="username" style="width:77%;" value="<?=$username?>">
			<div class="row"></div>
            <span>مرد</span>
            <?php
                $check="";

            if($gender==0) {
                $check = "checked";
            }
                ?>
            <input type="radio" value="0" name="gender" style="vertical-align: middle;" <?php echo $check;$check="";?>>


            <span> زن</span>
            <?php
            if($gender==1) {
                $check = "checked";
            }

                ?>
                <input type="radio" value="1" name="gender" style="vertical-align: middle; " <?php echo $check;$check="";?>>


            <br/>
            <br/>
		  <label>
			تاریخ تولد:
			</label>
			<style>
				select
				{
					width: 105px;
					
					border:1px solid #d1d1d1;
					margin:0 15px;
					font-family: 'b yekan';font-size: 12px;
					padding: 4px;
					text-align:center;
				}
			</style>
			
			<?php
			echo("<select>");
			echo("<option>روز</option>");
			for($i=1;$i<31;$i++)
			
			{
				echo("<option>$i</option>");
				
			}
			
			
			
			
			echo("</select>");
			$months=array("فروردین","اردیبهشت","خرداد","تیر","مرداد","شهریور");
			echo("<select>");
			echo("<option>ماه</option>");
			for($i=0;$i<count($months);$i++)
			
			{
				echo("<option>$months[$i]</option>");
				
			}
			
			
			
			
			echo("</select>");
			echo("<select>");
			echo("<option>سال</option>");
			for($i=1310;$i<1381;$i++)
			
			{
				echo("<option>$i</option>");
				
			}
			
			
			
			
			echo("</select>");
			?>
			<div class="row"></div>
			
			<label>
			کد ملی:
			</label>
		  <input type="text" placeholder="  کد ملی خود را وارد کنید" name="kod" id="kod"
                 value="<?=$codemeli?>"
                 style="width:84%;">
			
			
			<div class="row"></div>
			
			<label>
			شماره موبایل:
			</label>
		  <input type="text" placeholder="شماره موبایل خود را وارد کنید" name="mobile" id="mobile" style="width:77%;" value="<?=$mobile?>">
			
			
			<div class="row"></div>
			
			<label>
		      آدرس ایمیل:
			</label>
		  <input type="text" placeholder="آدرس ایمیل خود را وارد کنید" name="email" id="email" style="width:77%;" value="<?php echo $_SESSION['email']?>">
			
			<label style="display: inline-block;margin-right:78px;">دریافت خبر نامه</label>
			<input type="checkbox" checked style="display: inline-block;width: 34px;line-height: 10px;position:relative;top:4px;;">
			<br/>
			<label>
		      شماره کارت:
			</label>
		  <input type="text" placeholder="شماره کارت خود را وارد کنید" name="cart" id="cart" style="width:78%;" value="<?=$cartcode?>">
			<br/>
		 
		
		 
			<style>
				.button{
					background: #ff9933;
					color:white;
					padding:5px 15px;
					text-align: center;
					border-radius:4px;
					
					cursor: pointer;
					width:380px;
					height: 40px;
					font-family:'b yekan';
					border:1px solid #ff9933;
					font-size: 15px;
					margin:15px auto;
					margin-right: 48px;
				}
			</style>
			<div id="error" style="color: red;"></div>
			<button class="button" onClick="sabt2()" type="button">
			ثبت اطلاعات کاربری
			</button>
			
	  </form>
			
		</div>
</body>
</html>