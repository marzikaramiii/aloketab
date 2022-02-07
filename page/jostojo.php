


<?php
include('header.php');
echo "<a href=index.php style=float:right;line-height:38px;color:white;>صفحه اصلی</a>";
include "connect.php";
?>

<style>
	#main
	{
		margin-bottom: 0;
	}
#head #nav {

display: inline-block;
position: relative;
top: -14px;
height: 55px;
width: 650px;
left: 0 !important;

}
    #nav >li .menuclick
    {
        color: #ff9933;
        line-height: 59px;
        margin: 0px 28px;


    }
	#nav li 
	{
			text-align: center;
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
<link href="../file/css/jostojo.css" rel="stylesheet" type="text/css">



	<div id="search2">
		<span class="iconsearch"></span>
		<input type="text" placeholder="جستجوی کتاب فرو شی و کتابخانه">
		
		<ul class="c">
			<li class="active">بالاترین امتیاز</li>
			<li>نزدیک ترین</li>
			<li>تحویل رایگان</li>
			<li>گرانترین</li>
			<li>ارزانترین</li>
			<li>صفحه اصلی</li>
		</ul>
	</div>
	<center>
		<div class="list">

        <?php
        $sql="select * from booksell";
        $result=mysqli_query($link,$sql);
        while ($row=mysqli_fetch_array($result)) {
            ?>
            <div class="bookstores">
                <a href="bookstore.php?id=<?=$row['id']?>">
                    <img class="pic2" src="../pic/bookstore/<?=$row['image']?>" width="110" height="150" alt=""/>
                    <p class="l">
                        <span class="g">نام:</span>
                        <?=$row['name']?>
                    </p>

                    <p class="l">
                        <span class="g">آدرس:</span>
                        <?="<span style='font-family:b yekan';>".$row['address']."</span>"?>
                    </p>
            <div id="starsum">
                    <?php
                    $rate=$row['rate'];
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

                        <span class="star <?=$check?>"></span>


                        <span class="but"><?=$rate?></span>
                        <?php
                    }
                ?>
                        </div>
                </a>
            </div>
            <?php
        }
            ?>


			</div>
	</center>
		
</div>
	<?php
   include('footer.php');
?>
<style>
.footer2
	{
		height: 41px;
	}
	.withus
{
	position: relative;margin-bottom: 10px;
	padding-right: 250px;
}

</style>

