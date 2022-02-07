

<?php
include('header.php');
include "connect.php";
echo "<a href=index.php style=float:right;line-height:38px;>صفحه اصلی</a>";
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
?>

<style>

	#main
	{
		margin-bottom: 0;
	}
#head #nav {
	

display: inline-block;
position: relative;
top: -27px;
	left:400px;
height: 55px;
width: 650px;
	margin-bottom: 0;

}

	#nav>li:hover
	{
		background: rgba(0,0,0,.5);
	}
	.menudown
	{
		left: 36px;
	}
	#search input
	{
		height:18px;
	}


</style>
<link href="../file/css/bookstore.css" rel="stylesheet" type="text/css"/>
<?php
$sql="select * from booksell WHERE id='$id'";
$result=mysqli_query($link,$sql);
while ($row=mysqli_fetch_array($result)) {
    ?>
    <div id="introduce">

        <img class="bookstorepic" src="../pic/bookstore/<?=$row['image']?>">
        <div id="star">
            <?php
            $rate=$row['rate'];
            for($i=0;$i<5;$i++) {
                if ($i < $rate) {
                    $checked = "checked";
                } else {
                    $checked = "";
                }

                ?>
                <span class="stars <?=$checked?>"></span>
                <?php
            }
            ?>
        </div>
        <span class="title" style="top:25px;"><?=$row['name']?></span>

        <span class="information" title="اطلاعات"></span>


    </div>


<div id="content">

	<ul id="mainnavbar">
		<li class="active" >لیست کتاب ها</li>
		<li >نظرات</li>
		</ul>
<div id="tabchild">
	<section style="display: block;">
<div id="navbar">
<ul>
<li>تازه ترین ها</li>
<li>ارزان ترین</li>
<li>پرفروش ترین</li>

</ul>
</div>
        <?php
        $sqlbooks="select * from booksellbooks WHERE booksellid='$id'";
        $result2=mysqli_query($link,$sqlbooks);
        while ($row2=mysqli_fetch_array($result2)) {
            $book="select * from books WHERE id='{$row2['bookid']}'";
            $resultbook=mysqli_query($link,$book);
            while ($showbook=mysqli_fetch_array($resultbook)) {
                ?>
                <div class="books">
                    <div class="bookpic">
                        <img src="../pic/books/<?=$showbook['image']?>">
                    </div>
                    <div class="bookdescrip">
                        <div class="bookdes">
                            <span class="titlebook">نام :</span>
                            <span class="des"><?=$showbook['name']?></span>
                        </div>
                        <div class="bookdes">
                            <span class="titlebook">نام نویسنده:</span>
                            <span class="des"><?=$showbook['author']?></span>
                        </div>
                        <?php
                        if($showbook['motarjem']!="") {
                            ?>
                            <div class="bookdes">
                                <span class="titlebook">نام مترجم:</span>
                                <span class="des"><?=$showbook['motarjem']?></span>
                            </div>
                            <?php
                        }
                            ?>
                        <div class="bookdes">
                            <span class="titlebook">قیمت:</span>
                            <span class="des"><?=$showbook['price']?>تومان</span>
                        </div>
                        <div id="starsum2">
                            <?php
                            $rate=$showbook['rate'];
                            for ($i=0;$i<5;$i++) {
                                if($i<$rate)
                                {
                                    $check="checked";
                                }
                                else
                                {
                                    $check=" ";
                                }

                                ?>

                                <span class="star2 <?=$check?>"></span>



                                <?php
                            }

                            ?>
                            <span class="but"><?=$rate?></span>
                        </div>

                    </div>
                    <?php if ($showbook['summary']!="")
                        {
                            ?>
                    <div class="summery" >
                        <?php

                            echo $showbook['summary'];
                            ?>
                </div>
                   <?php
                            }
          ?>

                </div>
                <?php
            }
        }
        ?>
</section>
	<section id="idea" style="display:none;">
	<span class="rang">4</span>
		<div id="starsum">
				<span class="star checked"></span>
				<span class="star checked"></span>
				<span class="star checked"></span>
				<span class="star checked"></span>
				<span class="star"></span>
				<span class="tedad">از 545 رای</span>

				</div>

	<div id="persnetidea">
		<div class="progressbar">

			<span class="emogi" style="background-image: url(../pic/happy.png)"></span>
		<div class="myprogress">
<div class="mybar" style="width: 70%;background-color: #66cc00;
">
	<span class="per">76%</span>
		</div>
			</div>
			<span class="emogi" style="background-image: url(../pic/meh.png)"></span>
		<div class="myprogress">
<div class="mybar" style="width: 50%;background-color: #FFCC66;
">
		</div>
			<span class="per">54%</span>
		</div>
			<span class="emogi" style="background-image: url(../pic/angry.png)"></span>
		<div class="myprogress">
<div class="mybar" style="width: 10%;background-color: #FF0000;
">
	<span class="per">12%</span>
		</div>

		</div>
			</div>
		</div>
		<div class="personidea">
		<img class="emojiperson" src="../pic/happy.png">
			<span class="name">مرضیه کرمی

			</span>
			<span class="date">98/6/12</span>
			<br>

			<p class="idea2">عاللللللییی</p>
		</div>
		<div class="personidea">
		<img class="emojiperson" src="../pic/meh.png">
			<span class="name">مریم بهارلو

			</span>
				<span class="date">98/6/12</span>


			<p class="idea2">کتاباش بد نبود!</p>
		</div>
		<div class="personidea">
		<img class="emojiperson" src="../pic/angry.png">
			<span class="name">ناشناس

			</span>
			<span class="date">98/6/12</span>


			<p class="idea2">چه قد گرون بودن</p>
		</div>
	</section>
	</div>
	</div>

<div id="dark"></div>
<div class="descrip">

	<h4> <?=$row['name']?></h4>
		<img src="../pic/-2.png" class="close" />

  <div class="tozih">
      <?php
      if($row['time']!="") {
          $time = $row['time'];

          $arr = explode('/', $time);
          $start = $arr[0];
          $end = $arr[1];
      }
      ?>
		<h4>ساعت کاری امروز</h4>
		<p style="direction: rtl"><?=$end."تا".$start?></p>
		</div>
			<div class="tozih">
		<h4>هزینه ارسال</h4>
		<p style="direction: rtl"><?=$row['ersal']?> تومان</p>
			</div>
				<div class="tozih">
		<h4>حداقل سفارش</h4>
		<p style="direction: rtl"><?=$row['minorderprice']?> تومان</p>
		</div>

  <div class="tozih">
		<h4>آدرس</h4>
		<p><?=$row['address']?></p>
			<div class="tozih">
		</div>
	  <img src="../pic/bookstore/<?=$row['image']?>" style="width: 200px;height: 200px;">
	</div>

	</div>
	<div class="booksummery">
	<h4>جایی که خرچنگ ها آواز میخوانند</h4>
		<div class="content">

		<img src="../pic/-2.png" class="close">

			<div class="sum">
				<div class="right">
				<img src="../pic/amoot1.jpg" class="imgpic">
					</div>
				<div class="left">
				<div class="bookdes">
		 <span class="titlebook">نام :</span>
         <span class="des">جایی که خرچنگ ها آواز می خوانند</span>
				</div>
					<div class="bookdes">
		 <span class="titlebook">نام مترجم:</span>
         <span class="des">آرتمیس مسعودی</span>
				</div>
			<div class="bookdes">
		 <span class="titlebook">قیمت:</span>
         <span class="des">58,000تومان</span>
				</div>
					<div class="bookdes">
		 <span class="titlebook">ناشر:</span>
         <span class="des">آموت</span>
				</div>
			<div id="starsum">
				<span class="star checked"></span>
				<span class="star checked"></span>
				<span class="star checked"></span>
				<span class="star"></span>
				<span class="star"></span>
				<span class="tedad">از 72 رای</span>

				</div>

					</div>
			</div>
		<div class="summery">
		<p style="text-align: justify">شاید نام «کیا» فقط از سه حرف تشکیل شده باشد، اما رنج‌هایی که او متحمل شده است در روح و جسم هیچ دختری نمی‌گنجند. تمام اهالی بارکلی کو، او را با لقب «دختر مرداب» می‌شناسند، دختر مردابی که نزدیک شدن او به سایر انسان‌ها تجربیات تلخ و شیرینی برایش به همراه دارد. حوادث پیچیده‌ی متعددی قبل و بعد از پیدا شدن جسد معشوقه‌ی سابق او رخ می‌دهد که دلیا اونز (Delia Owens) به زیبایی هر چه تمام‌تر آن‌ها را شرح می‌دهد.

نویسنده در این رمان که اولین اثرش نیز محسوب می‌شود، هنر تصویرسازی خود را به رخ می‌کشد. او با این داستان به زیبایی هر چه تمام‌تر نشان می‌دهد که انزوا چه تغییری در رفتار انسان‌ها ایجاد می‌کند. در این رمان خواهید فهمید طرد شدن از جانب آدم‌های اطرافتان، شما را چه حالی می‌کند. کیا، قهرمان داستان یک شیر زن فراموش نشدنی است.

این اثر یک درام جنایی، عاشقانه و معمایی است که شما عاشقش خواهید شد. این رمان به تار و پود طبیعت‌تان سفر می‌کند و سؤالاتی بی‌پاسخ می‌پرسد، سؤالاتی که قدمتی به اندازه‌ی مرداب دارند. این کتاب شرح حالی از تلاش برای بقا، امید داشتن، عشق ورزیدن، تنهایی، نومیدی، غرور، تعصب و انعطاف پذیری است.</p>
			</div>
	</div>
		</div>
<script>
	$('.close').click(function(){
		$('#dark').fadeOut(200);
		$('.descrip').fadeOut(200);

	});
	$('.close').click(function(){
		$('#dark').fadeOut(200);
		$('.booksummery').fadeOut(200);

	});
		$('.information').click(function(){
			$('#dark').fadeIn(200);
		$('.descrip').fadeIn(200);
		})
	$('.booktozih').click(function(){
			$('#dark').fadeIn(200);
		$('.booksummery').fadeIn(200);
		}),
		$('#mainnavbar li').click(function () {
            $('#mainnavbar li').removeClass('active');
            $(this).addClass('active');
            $('#tabchild section').fadeOut(0);
            var index = $(this).index();
            $('#tabchild section').eq(index).fadeIn(100);

        });
	</script>

    <?php
}
?>

<style>
    .download ul
    {
        margin-bottom: 0;

    }
    .download .name
    {
        position:static;
    }
    footer h4
    {
        margin:2px 194px;
    }

</style>
<?php
include('footer.php');


?>
