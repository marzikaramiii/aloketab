<?php


include ("connect.php");
if($_GET['id'])
{
    $id=$_GET['id'];
    $_SESSION['id']=$_GET['id'];
}
$name=$_POST['name'];
$family=$_POST['family'];
$kod=$_POST['kod'];
$email=$_POST['email'];
$cart=$_POST['cart'];
$mobile=$_POST['mobile'];
$gender=$_POST['gender'];
$username=$_POST['username'];
$realname=$name." ".$family;
$_SESSION['realname']=$realname;
$_SESSION['email']=$email;
$_SESSION['gender']=$gender;
$_SESSION['login']=true;
include('panel_menu.php');

$sql="update users set username='$username',name='$name',family='$family',gender='$gender',codemeli='$kod',realname='$realname',email='$email',
mobile='$mobile',cartcode='$cart' WHERE id='$id'";
mysqli_query($link,"SET NAMES utf8");
if(mysqli_query($link,$sql))
{
    echo "اطلاعات شما ثبت شد!";
    $_SESSION['login']=true;
}
else
{
    echo "no sabt";
}

?>
<style>
h3
	{
		font-weight: normal;
		
	}
	table
	{
		
		width: 80%;
		margin:0 auto;
		direction: rtl;
		
	}
	td
	{
		border: 1px solid #d1d1d1;
		text-align: right;
		padding: 5px;
		direction: rtl;
	}
	.n
	{
		font-size: 15px;
		color: #ff9933;
	}

</style>
<h3>اطلاعات شخصی</h3>
<table cellspacing="0">
<tr>
	<td>
	<label class="n">نام و نام خانوادگی: </label>
		<br>
		<label><?=$realname?></label>
	</td>
	<td>
	<label class="n">پست الکترونیک: </label>
		<br>
		<label><?=$email?></label>
	</td>
	</tr>

	<tr>
	<td>
	<label class="n">شماره تلفن همراه: </label>
		<br>
		<label><?=$mobile?></label>
	</td>
	<td>
	<label class="n">کد ملی: </label>
		<br>
		<label><?=$kod?></label>
	</td>
	</tr>

	<tr>
	<td>
	<label class="n">دریافت خبر نامه: </label>
		<br>
		<label>بله</label>
	</td>
	<td>
	<label class="n">شماره کارت: </label>
		<br>
		<label><?=$cart?></label>
	</td>
	</tr>
	
	<tr>
	<td colspan="2" style="text-align: center;">
        <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
        ?>
		<a href="takmil.php?id=<?=$id?>">
		<label style="color: #ff9933;border-bottom: 1px dotted #ff9933;cursor: pointer">
	ویرایش اطلاعات شخصی
			</label> 
			</a>
	</td>
	
	</tr>
</table>