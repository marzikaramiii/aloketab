<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تکمیل خرید</title>
    <link rel="stylesheet" type="text/css" href="../file/css/footer.css">

</head>
<body style="margin: 0;background: #eeeeee">
<style>
	body{
		margin:0;
	}
    @font-face
		{
font-family:'Yekan';
src:url(../fonts/Yekan.eot)format('eot'),
	url(../fonts/Yekan.ttf)format('ttf'),
    url('../fonts/Yekan.ttf') format('truetype');

            }

    p, a, ul, li, div, span {
        text-align: right;
        direction: rtl;
    }

    a {
        text-decoration: none;
    }

	ul li{
		list-style: none;
	}
	#nav{
		text-align: center;
	width: 100%;

		font-family: 'Yekan';
	}
	.pic1{
	float: left;
	margin-left: 20px;
	margin-top: 6px;
}
	.a li{
	color: #ff9933;
	display: inline-block;
	margin-top: 10px;
}
.b{
	float: right;
	margin-right: 20px;

}
	.b a{
		text-decoration: none;
		color:#ff9933;
	}.a{
		text-align: center;
		margin:0;
	}



	header{
	background-color: #333333;
	height: 40px;
		text-align: center;
}
</style>

<div id="nav">
<img class="pic1" src="../pic/BOOOOK-3.png" width="70" height="30" alt=""/>
	<header>
		<ul class="a">
			<li>سبد خرید</li>
			<li class="b"><a href="index.php">منوی اصلی</a></li>

        </ul>

	</header>

<style>
    #main::after {
        content: " ";
        width: 100%;
        display: block;
        clear: both;
    }

    #main {
        width: 1150px;
        background: #fff;
        margin: 10px auto;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .4);
        border-radius: 4px;
        padding: 10px;
        font-family: Yekan;
    }

    #main .header h4 {

        margin-right: 10px;
        font-weight: normal;

    }

    .btn-blue {
        width: 170px;
        height: 40px;
        display: block;
        background:#333333;
        box-shadow: 1px 1px 3px #d1d1d1;
        border-radius: 4px;
        color: #fff;
        line-height: 38px;
        text-align: center;
        float: left;

    }
    .btn-green {
        width: 170px;
        height: 40px;
        display: block;
        background:#ff9933;
        box-shadow: 1px 1px 3px #d1d1d1;
        border-radius: 4px;
        color: #fff;
        line-height: 38px;
        text-align: center;
        float: left;

    }
    .header{
        width: 100%;
        float: left;
        height: 30px;
    }

    .header .btn-blue {
        float: left;
        position: relative;
        top: 27px;
        left: 22px;
    }

    .content table {
        width: 100%;

    }
    .content table td{
        border: 1px solid #eee;
        padding: 5px;
    }
    .content table tr:first-child {
        background: #f7f9fa;
        text-align: center;

    }


    .content table .right {
        float: right;
        padding-right:15px ;
    }

    .content table .right img {
        max-height: 135px;
        max-width: 135px;
    }

    .content table .left {
        float: right;
        margin-right: 20px;

    }

    .content table .left p {
        margin: 2px;

    }


    .content table .left .color {
        width: 16px;
        height: 16px;
        display: inline-block;
        background: red;
        border-radius: 50%;
        position: relative;
        top: 4px;
        right: 5px;
        border: 1px solid #cccccc;
    }
    .content table tr td:not(:first-child){
        text-align: center;
    }
    .content table td .price{
        font-size: 13pt;
    }
    .content table td .toman{
        font-size: 10.5pt;
    }
    .content table .remove-td{
        background:#f1acac;
    }
    .content table .remove-icon{
        width: 15px;
        height: 15px;
        background: url("images/slices.png")-813px -510px;
        display: block;
        position: relative;
        left: -7px;
    }
    .order-steps {
        padding-top: 30px;
        padding-right: 258px;
        padding-bottom: 49px;
    }

    .order-steps .dashed {
        float: right;
        margin-top: 13px;

    }

    .order-steps .dashed span {
        width: 11px;
        height: 2px;
        background: #ccc;
        display: inline-block;

        margin-left: 5px;
    }

    .order-steps .dashed.active span {
        background: #ff9933;
    }

    .order-steps ul li {
        position: relative;
        width: 160px;
        height: 10px;
        float: right;
    }

    .order-steps ul li .circle {
        width: 19px;
        height: 19px;
        border: 3px solid #ccc;
        border-radius: 100%;
        display: block;
        position: absolute;
    }

    .order-steps ul li.active .circle {

        border: 3px solid #ff9933;
        background: #ff9933 url("images/slices.png") no-repeat -809px -475px;
    }

    .order-steps ul li .title {
        font-size: 10pt;
        color: #ccc;
        position: absolute;
        top: 25px;
        right: -29px;
    }

    .order-steps ul li.active .title {
        color: #ff9933;
    }

    .order-steps ul li .liner {
        width: 128px;
        height: 1.5px;
        display: block;
        background: #ff9933;
        position: absolute;
        top: 12px;
        right: 30px;
    }

    .order-steps ul li.active .liner {
        background: #ff9933;
    }
    .discount{
        display: block;
        color: #aaaaaa;
        font-size: 10pt;

    }
    #pardakht-price{
        width: 97%;
        background:#ff9933;
        color: #fff;
        padding: 10px;
        margin: 20px 5px;
        border: 1px solid #FEB599;
    }


    #pardakht-price .total-price2{
        margin-right: 900px;
    }
    #pardakht-price .total-price3{
        font-size: 12px;
    }
     .circle.active {
        background: dodgerblue;
        border: 0;
        position: relative;
    }

   .circle.active::after {
        content: "";
        width: 5px;
        height: 5px;
        display: block;
        position: absolute;
        border-radius: 100%;
        background: white;
        top: 5px;
        right: 5px;
    }



    .pardakht-type .circle.active  tr:first-child td:first-child {
        background: #f7fff7;
    }

    table img {
        position: relative;
        top: 2px;
    }

    .post {
        margin: 0;
        margin-right: 13px;

    }
   .pardakht-type {
        width: 100%;
        border-top: 1px solid #ccc;
        border-right: 1px solid #ccc;
        margin-top: 20px;
       margin-bottom: 30px;

    }

    .pardakht-type td {
        border-left: 1px solid #cccccc;
        border-bottom: 1px solid #ccc;
        padding: 5px;
        padding-right: 15px;
        color: #717270;

    }

    .circle {
        width: 15px;
        height: 15px;
        display: block;
        margin: auto;
        border: 1px solid #ccc;
        border-radius: 50%;

    }
    .moshakhasat
    {
        font-size: 17px;
        text-align: center;
        border: 1px solid #ff9966;
        padding: 8px;
        float: left;
        width: 98%;

    }
    .moshakhasat label
    {
        color:#4B4A4A;
    }
    .moshakhasat input
    {
        padding: 4px;
        margin-top:10px;
        font-family:"Yekan";
    }
    .moshakhasat input,textarea
    {
        border:1px solid #d1d1d1;
        border-radius: 4px;

    }
    .listsefareshat td
    {
        border: 1px solid #d1d1d1;
    }
</style>

<div id="main">
    <div class="order-steps">
        <div class="dashed active">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul>
            <li class="active"><span class="circle"></span><span class="title">ورود به الوکتاب</span><span
                    class="liner"></span></li>
            <li class="active"><span class="circle"></span><span
                    class="title">اطلاعات ارسال سفارش</span><span class="liner"></span></li>
            <li class="active"><span class="circle"></span><span class="title">باز بینی سفارش</span><span
                    class="liner"></span></li>
            <li style="width: 29px;"><span class="circle"></span><span class="title"
                                                                       style="width: 95px;">اطلاعات پرداخت</span>
            </li>

        </ul>
        <div class="dashed" style="margin-top:-3px;">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="moshakhasat">
        <form action="sabtsefarsh.php" method="post">
        <label>نام و نام خانوادگی:</label>
       <?=$_SESSION['realname']?>
        <br/>
        <label>تاریخ ثبت سفارش:</label>
        <?=date("d-m-Y")?>
        <br/>


        <?php
        include "connect.php";
        mysqli_query($link,"SET NAMES utf8");
        $sql="select * from users where id='{$_SESSION['userid']}'";
        $result=mysqli_query($link,$sql);
        $row=mysqli_fetch_array($result);
        if($row)
        {
?>
            <label> ایمیل:</label>
            <?=$row['email']?>
            <br/>
            <label> تلفن همراه:</label>
            <?=$row['mobile']?>
            <br/>
       <?php
        }
        ?>

            <label>زمان ارسال:</label>
            5روز کاری
            <br/>
            <label>آدرس:</label>
            <textarea name="address" style="max-width: 200px;max-height:100px;min-height:100px;min-width:200px;vertical-align:middle">
        </textarea>
            <br/>
            <label>کدپستی:</label>
            <input type="text" name="codeposti" id="codepoti">
            <br/>

        <h3 style="font-weight: normal">سفارشات</h3>
        <table width="100%" class="listsefareshat" cellspacing="0">
            <tr style="background-color: #d1d1d1;" >
                <td>نام کتاب</td>
                <td>عکس کتاب</td>
                <td>تعداد سفارش</td>
                <td>قیمت واحد</td>
                <td>قیمت کل</td>
            </tr>
            <?php
            $sql="select * from sabadkharid WHERE userid='{$_SESSION['userid']} ' AND  states='0'";
            $result=mysqli_query($link,$sql);

            while($row=mysqli_fetch_array($result)) {
                $sql2="select * from books WHERE  id='{$row['bookid']}'";
                $result2=mysqli_query($link,$sql2);
                $row2=mysqli_fetch_array($result2);
                if($row2) {
                    ?>
                    <tr>
                        <td><?= $row2['name'] ?></td>
                        <td><img src="../pic/books/<?=$row2['image']?>" width="80" height="90"></td>
                        <td><?= $row['qty'] ?></td>
                        <td><?= $row2['price'] ?></td>
                        <td><?= $row2['price']*$row['qty'] ?></td>
                    </tr>

                    <?php
                }
            }
            ?>

        </table>
            <input type="text" style="background-color:#FF9933;width: 97%;padding: 10px;border: none;text-align: center;color: white;margin-bottom: 20px;font-size: 15px;" value="<?="جمع کل پرداخت:".$_SESSION['pardakht']."تومان"?>" readonly>

            <input type="submit" class="btn-gray" value="پرداخت و تکمیل خرید" style="float: left;">
            <a href="cart.php?id=<?=$_SESSION['userid']?>"><span class="btn-gray"> بازگشت</span></a>
        </form>
    </div>





<style>
        .btn-gray{
            width: 170px;
            height: 40px;
            display: block;
            background: #6d717a;
            box-shadow: 1px 1px 3px #ccc;
            border-radius: 4px;
            color: #fff;
            line-height: 38px;
            text-align: center;
            float: right;
        }
        </style>


</div>
	<style>
		footer{
			font-family: 'Yekan';
			width: 99.5%;
		}
		.footer2 ul{
			margin:0;
		}
	</style>
<footer>
			<div class="footer2">
			<ul id="contactus">
				<li><a>درباره ما</a></li>
				<li><a>تماس با ما</a></li>
				<li><a>راهنما </a></li>
				<li><a>شرایط استفاده</a></li>
				<li><a>همکاری با ما</a></li>
				<li><a>RSS کتاب ها</a></li>
				<li><a>ورود ناشران</a> </li>
			   	</ul>
			<div >
				<ul id="socialmedia">
				<li><span class="telegram icon"></span></li>
					<li><span class="insta icon"></span></li>
					<li><span class="twiter icon"></span></li>
					<li><span class="facebook icon"></span></li>
					<li><span class="whatsup icon"></span></li>
				</ul>
				</div>
			</div>
				<div class="download">
				<center><h4 style="position: relative; right: 113px;margin-bottom: 10px;">اپلیکیشن الو کتاب را دانلود کنید</h4></center>
					<ul>
					<li><span class="apple namad"></span><span class="name">نسخه Ios</span></li>
						<li><span class="windows namad"></span><span class="name">نسخه ویندوز</span></li>
						<li><span class="android namad"></span><span class="name">نسخه اندروید</span></li>
					</ul>
				</div>
			</footer>

