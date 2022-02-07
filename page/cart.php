
<style>
#search
	{
		margin-top:12px;
	}
</style>
<link href="../file/css/j2.css" rel="stylesheet" type="text/css">
<div id="search">
	<a href="index.php" style="color: #ff9933;margin: 12px;margin-top:20px;">
		صفحه اصلی	
		</a>
			</div>
<?php
include('header.php');

?>
<style>
	body
	{
		background-color: #eee;
	}
	#head #nav {
	

display: inline-block;
position: relative;
    
top: -26px;
		right: -338px;
height: 55px;
width: 650px;

}
	#nav li 
	{
			text-align: center;
	}
    #nav li>.menuclick
    {
        display: inline-block;
    }
    .menuclick:hover
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
	#head
	{
		display: block;
	}
	.titr ul
	{
		padding: 0;
		border-bottom: 1px solid #d1d1d1;
		
	}
    .menudown
    {
        left: 35px;
    }
    .traingle
    {
        top: 22px;
    }
    .userflash
    {
        position: relative;
        top:-7px !important;
    }
    .user
    {
        top:15px;
    }
</style>


<div class="titr">
	<ul >
		<li class="titr" style="border-bottom:3px solid #ff9933">سبد خرید</li>
	</ul>
</div>
	<style>
	#c
		{
			margin-bottom: 15px;
			height: 300px;
		}
	
	</style>

	<style>
		.product
		{
			width: 800px;
			background-color: white;
			height:231px;
			float: right;
			margin-right: 200px;
			
			padding: 5px;
			box-shadow: 1px 2px 3px #d1d1d1;
			border-bottom: 1px solid #d1d1d1;
			
		}
		.product:first-child
		{
			margin-top: 40px;
		}
		.product:last-child
		{
			margin-bottom: 40px;
		}
		.productpic
		{
			float: right;
			margin: 10px 10px;width: 200px;
			text-align: center;
		
		}
		.productpic img
		{
				width: 140px;
			height: 200px;
		}
		.intro2
		{
			float: left;
			text-align: right;
			width: 580px;
			padding-top: 10px;
		}
		.intro2 h4,h5,h6
		{
			color: #ff9933;
			text-align: right;
			font-size: 20px;
			margin: 2px;
		}
		.intro2 h5
		{
			font-size: 15px;
			font-weight: normal;
			color:#333;
		}
		.intro2 h6
		{
			font-size: 14px;
			font-weight: normal;
			color:#333;
		}
		.price2
		{
			
			padding: 0px 15px;
			direction: rtl;
			text-align: left;

		}
		.discount
		{
			color: red;
		}
		.asli
		{
			color: #333;
			
		}
		ul
		{
			
			padding: 0;
			text-align: center;
		}
		.titr ul
		{
			text-align:right;
		}
		.continue
		{
			width: 800px;
			background-color: white;

			float: right;
			margin-right: 200px;
			margin-bottom: 100px;
			padding: 5px;
			position:sticky;
			bottom: 0;
			text-align: right;
		     box-shadow: 1px 2px 3px #d1d1d1;
			border-top: 1px solid #d1d1d1;
		}
        .delete
        {
            background-color: #FF9933;
            width: 80px;
            padding: 5px;
            margin-bottom: 5px;
            display: inline-block;
            text-align: center;
            color: white;
            border-radius: 4px;
            box-shadow: 1px 1px 3px #67686a;
            cursor: pointer;
        }
	</style>
	
<?php
include "connect.php";
if(isset($_GET['id']))
{
    $userid=$_GET['id'];
}
mysqli_query($link,"SET NAMES utf8");
$sql="select * from sabadkharid where userid='{$_SESSION['userid']}' and states='0'";

$result=mysqli_query($link,$sql);
global $pardakht;
$koltakhfif=0;
$priceasli=0;
$empty=true;
$kolprice=0;
$totalprice=0;
$dir="../pic/books/";
while($row=mysqli_fetch_array($result)) {
   $sql2="select * from books WHERE id='{$row['bookid']}' ";
    $result2=mysqli_query($link,$sql2);
    if ($row2=mysqli_fetch_array($result2)) {
        $empty=false;
        ?>
        <div class="product" >
            <div class="productpic">
                <img src="<?php echo $dir.$row2['image']?>">

            </div>
            <div class="intro2">
                <h4>
                   <?=$row2['name']?>
                </h4>
                <h5>
                    گارانتی اصالت و سلامت فیزیکی کالا
                </h5>
                <span class="tedad" style="direction: rtl;"><?=$row['qty'].":تعداد"?></span>
                <br/>
                <span class="tedad" style="direction: rtl;"><?=$row2['price'].":قیمت واحد"?></span>
                <div class="price2">
                    <?php
                    $price=$row2['price'];
                    $kolprice=$price*$row['qty'];
                    $priceasli=$priceasli+$kolprice;
                    if($row2['discount']>0) {


                        $discount=$row2['discount'];
                        //کل مبلغ با تعداد


                        $totalprice=$kolprice-($discount/100*$kolprice);
                        $pardakht=$pardakht+$totalprice;
                        //قیمت کل پرداخت


                        //محاصبه کل درصد
                        $koltakhfif=$koltakhfif+($discount/100*$kolprice);
                        echo "قیمت اصلی:".$kolprice."تومان";
                        ?>
                        <div class="discount"><?= $row2['discount']."%"."تخفیف"
                            ."(".strval($kolprice-$totalprice)."تومان )";
                            ?></div>
                        <div class="asli">
                            <?php

                            echo "قیمت پرداخت:".$totalprice;
                            echo "تومان";
                            ?>



                        </div>
                        <?php
                    }
                    else{
                        $pardakht=$pardakht+$kolprice;
                        echo "قیمت پرداخت:".$kolprice."تومان";
                        echo "<br/>";

                    }
                        ?>


                </div>
            </div>
        </div>

        <?php

    }



}

?>
<style>
    .continue a
    {
        line-height: 38px;

    }
    .gocart
    {
        width: 400px;
        display: inline-block;
        height: 40px;
        background-color: #ff9933;
        text-align: center;
        border-radius: 5px;
        margin-top: 14px;
        margin-right: 14px;

    }
    .end
    {
        float: left;
        color:#777;
        direction: rtl;
        margin-left: 15px;
    }
    .q
    {
        direction: rtl;
    }
</style>
<div class="continue">


        <?php
        if($empty==true)
        {
            echo "<img src=../pic/emptycart.png style='margin-right:264px;'>";
            echo "<h3 style=margin-top:15px;text-align:center;border:none;margin:0px;>!سبد خرید شما خالی است</h3>";

        }
        else {

            ?>
            <a href="showcart4.php">
        <span class="gocart">
          ادامه فرایند خرید
            </span>
            </a>
            <div class="end">
                <span>مبلغ قابل پرداخت</span><br/>
                <?php
                $_SESSION['pardakht']=$pardakht;
                ?>
                <span style="color: #333;font-size: 20px;"><?= $pardakht ?><span>
				<span style="color: #333;font-size: 14px;">تومان<span>
            </div>
            <?php
        }
    ?>
</div>
	<section style="margin-top:40px;box-shadow: 1px 2px 3px #d1d1d1;">
		<ul class="q" >
			<li class="q" style="margin-right: 15px;color: dimgray;">قیمت کالا ها</li>
			
			<li class="q" style="margin-right: 25px;color:dimgray;"><?=$priceasli?>
			<span style=" margin-right:5px;margin-top:5px;font-size: 15px;color:dimgray;">تومان</span>
			</li>
		</ul>
		<ul class="q">
			<li class="q" style="margin-right: 15px;color: dimgray;">تخفیف کالا ها</li>
			
			<li class="q" style="margin-right: 25px;color:dimgray;color: red;"><?=$koltakhfif?>
			<span style=" margin-right:5px;margin-top:5px;font-size: 15px;color:dimgray; color: red;">تومان</span>
			</li>
		</ul>


		<hr color="#eee" style="width:300px;opacity:20">
		<ul class="q" style="margin-bottom: 0px;">
			<li class="q" style=";margin-right: 15px;color:#424141">مبلغ قابل پرداخت</li>
			
			<li class="q" style="margin-right: 25px;color:black;font-weight: bold;"><?=$pardakht?>
				<span style=" margin-right:5px;margin-top:5px;font-size: 15px;color:#424141; ">تومان</span>
			
			</li>
		</ul>
		
		<div style="text-align: right;">

		</div>
	</section>


<?php
include('footer.php');
?>
<style>
footer
	{
		clear: both;
	}
	.download ul
	{
		margin: 0;
	}
.download h4
	{
		margin:2px 194px;
	}
</style>


