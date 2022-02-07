
<?php
include('header.php');
include ("connect.php");
?>
<div id="search">
			<input name="search" placeholder="جست و جو کنید...">
				<img src="../pic/s.png" alt="hh">
			</div>
</div>
<style>

#head #nav {
	
padding: 0;
display: inline-block;
position: relative;
    left:340px;
top: -28px;
height: 55px;
width: 650px;

}
p{
    margin: 2px;
}
	#nav>li:hover{
	background: rgba(0,0,0,.5);

	}
	#search input
	{
		height: 19px;
	}
</style>
		<div id="content" >
		<div id="slider">
			<span class="prev"></span>
			<span class="next"></span>
            <?php
            $sql="select * from slider limit 3";
            $result=mysqli_query($link,$sql);
            $dir="../pic/slider/";
            while ($row=mysqli_fetch_array($result)) {
                ?>
                <a class="item">
                    <img src="<?php echo $dir.$row['image']?>">
                </a>
                <?php
            }
            ?>
			</div>
	     
			
		
		</div>

			<div class="gallery">
							<h3>پروفروش ترین های الو کتاب</h3>
				<ul>

                        <?php
                        $sql="select * from books order by forosh desc limit 6";
                        mysqli_query($link,"SET NAMES utf8");
                        $result=mysqli_query($link,$sql);
                        $dir="../pic/books/";
                        while ($row=mysqli_fetch_array($result)) {

                            ?>
                            <li><a href="book.php?id=<?=$row['id']?>">
                                    <img src="<?php echo $dir.$row['image'];?>" style="height: 260px;"/>
                                    <p class="discription"><?php echo $row['name']?></p>
                                    <p class="discription2"><?php echo $row['author']?></p>
                                    <p class="price"><?php echo $row['price']."تومان"?></p>
                                    <a class="addcart" id="<?=$row['id']?>" style="color:red;cursor: pointer;">افزودن به سبد خرید</a>
                                </a>
                            </li>

                            <?php
                        }
                    ?>


				</ul>
			</div>
			
		<div class="gallery">
							<h3>تخفیف های ویژه الو کتاب</h3>
				<ul>
                    <?php
                    $sql="select * from books WHERE discount>0 limit 6";
                    $result=mysqli_query($link,$sql);
                    $dir="../pic/books/";
                    while ($row=mysqli_fetch_array($result)) {
                        $discount=$row['discount'];
                        $price=$row['price'];
                        $totalprice=$price-($discount/100*$price);
                        ?>
                        <li><a href="book.php?id=<?=$row['id']?>">
                                <img src="<?php echo $dir.$row['image']?>" style="height: 260px;"/>
                                <p class="discription"><?php echo $row['name']?></p>
                                <p class="discription2"><?php echo $row['author']?></p>
                                <span class="off"><?php echo $row['price']."تومان"?></span>
                                <span class="price" style="direction: rtl;"><?php echo $totalprice."تومان"?></span>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

				</ul>
			</div>
<div class="gallery">
    <h3>کتاب های دست دوم </h3>
    <ul>
        <?php
        $sql="select * from dastdovom limit 6";
        $result=mysqli_query($link,$sql);
        $dir="../pic/dastdovom/";
        while ($row=mysqli_fetch_array($result)) {

            ?>
            <li><a href="book.php?id=<?=$row['id']?>&type=dastdovom">
                    <img src="<?php echo $dir.$row['bookimage']?>" style="height: 260px;"/>
                    <p class="discription"><?php echo $row['bookname']?></p>
                    <p class="discription2"><?php echo $row['authorname']?></p>
                    <span style="color:green" ><?php echo $row['bookprice']."تومان"?></span>
                    <br>
                    <span style="color:dodgerblue;direction: rtl;" ><?php echo "نام فروشنده:".$row['realname']?></span>
                </a>
            </li>
            <?php
        }
        ?>

    </ul>
</div>
			<div class="authors">
			
			
				<h3>
				
				نویسندگان مطرح این هفته
				</h3>
				<ul>
                    <?php
                    $sql="select * from author WHERE matrah=1 limit 3";
                    $result=mysqli_query($link,$sql);
                    $dir="../pic/author/";
                    while ($row=mysqli_fetch_array($result)) {
                        ?>

                        <li>
                            <a href="authorsdescription?id=<?php echo $row['id']?>">
                                <img src="<?php echo $dir . $row['image'] ?>" class="authorsimage"/>
                                <div class="authorsdiscription">
                                    <h3 style="margin: 0;"><?php  echo $row['name']?></h3>
                                    <?php
                                    echo substr($row['details'],0,350);
                                    echo "...";
                                    ?>

                                    <div class="more">
                                            بیشتر بخوانید

                                    </div>
                                </div>

                            </a>
                        </li>
                        <?php
                    }
                    ?>
				</ul>
				
			</div>
		<div class="progressbar">
            <h3>میزان فروش الوکتاب در هفته اخیر</h3>
            <?php
            //در آوردن موضوع های کتاب
            $query="select distinct type from books";
            $result=mysqli_query($link,$query);
            $type=array();
            while ($row=mysqli_fetch_array($result))
            {
             array_push($type,$row['type']);
            }

            $color=array("orange","pink","lightgreen","purple");

            for ($i=0;$i<count($type);$i++)
            {
              //به دست آوردن مجموع کتاب ها و مجموع فروش
                $sql="select sum(forosh) as kolforosh,sum(kol) as kolketab from books WHERE type='$type[$i]'";
                $result=mysqli_query($link,$sql);
                if($row=mysqli_fetch_array($result)) {

                    $kolforosh = $row['kolforosh'];
                    $kolketab = $row['kolketab'];
                    // به دست آوردن درصد با تقسیم فروش بر کل
                    $darsad = $kolforosh / $kolketab * 100;
                    $darsad = floor($darsad);
                    ?>
                    <span class="title"><?php echo $type[$i] ?></span>
                    <div class="myprogress">
                        <div class="mybar" style="width:<?php echo $darsad . "%" ?>;background-color: <?php  echo $color[$i]?>;
                                ">
                            <span class="percent"><?php echo $darsad . "%" ?></span>
                        </div>

                    </div>
                    <?php

                }

                            }
            ?>


				

				
			</div>
	
		
		
		<?php

         include("footer.php");
        ?>
		<style>
        .download ul
			{
				margin:0;
			}
			.withus
{
	position: relative;margin-bottom: 10px;
	
}
			footer h4
	{
		margin:2px 194px;
	}
    .addcartalert
    {
        width: 300px;
        min-height: 170px;
        background-color: white;
        position: fixed;
        z-index: 28;
        right: 0;
        left: 0;
        margin: 0 auto;
        top: 25%;
        border-radius: 4px;
        box-shadow: 1px 2px 5px #323233;
        direction: rtl;
        display: none;

    }
            .exit
            {
                width: 25px;
                height: 25px;
                top: 7px;
                left: 9px;
                position: absolute;
                cursor: pointer
            }
            #sabadkharid
            {
                position: absolute;
                font-size: 14px;
                text-align: right;
                right: 20px;
                border-bottom: 1px solid #323233;
                top: 18px;
                width: 250px;
                padding-bottom: 3px;
                padding-right: 10px;


            }
            #basket
            {
                width: 24px;
                height: 24px;
                vertical-align: middle;
                float: right;

            }
            #bookname
            {
                position: absolute;
                font-size:13px;
                text-align: right;
                right: 20px;
                top: 57px;
                width: 271px;
                padding-bottom: 3px;
                border: none !important;

            }
            #tasvieh
            {
                position: absolute;
                left: 20px;
                top: 119px;
                padding: 6px;
                background-color: #333;
                font-size: 12px;
                width: 35%;
                text-align: center;
                border-radius: 4px;
                color: white;
                cursor: pointer;
            }
            #edame
            {
                position: absolute;
                right: 20px;
                top: 119px;
                padding: 6px;
                background-color: #FF9933;
                font-size: 12px;
                width: 35%;
                text-align: center;
                border-radius: 4px;
                cursor: pointer;

            }
            #dark
            {
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                left: 0;
                background-color: rgba(0,0,0,.5);
                z-index: 6;
                display: none;
            }
</style>


	<div class="addcartalert">
		<img src="../pic/-2.png"  class="exit">
         <h3 id="sabadkharid">
             سبد خرید شما
             <img id="basket" src="../pic/supermarket.png">
         </h3>
        <h3 id="bookname">
            <span>

            </span>
            به سبد خرید شما اضافه شد.
        </h3>
       <a id="tasvieh" href="cart.php?id=<?=$_SESSION['id']?>">تسویه حساب</a>
        <a id="edame">ادامه خرید</a>
	</div>
		<div id="dark">
	</div>

	<script>
        //--addcart

        $(".addcart").click(function () {
            var id=$(this).attr('id');
            var bookname=$(this).parents("li").find(".discription").html();

            $.ajax({

                url:'addcart.php',
                type:'post',
                data:{id:id}

            })
                .done(function (msg) {
                  if(msg==1)
                   {
                    $(".addcartalert").find("#bookname span").html(bookname);
                    $(".addcartalert").fadeIn(100);
                    $("#dark").fadeIn(100);
                   }
                   else
                   {
                       $(".addcartalert").find("#bookname").html("چیزی به سبد خرید شما اضافه نشد");
                   }

                })
        });


		 var slidertag = $('#slider');
    var slideritems = slidertag.find('.item');
    var nextslide = 1;
    var numitems = slideritems.length;
    var slidenavigators = slidertag.find('.navigator ul li');
    var timeout = 3000;


    function slider() {

        if (nextslide > numitems) {
            nextslide = 1;
        }
        if (nextslide < 1) {
            nextslide = numitems;
        }

        slideritems.hide();
        slideritems.eq(nextslide - 1).fadeIn(100);
        slidenavigators.removeClass('active');
        slidenavigators.eq(nextslide - 1).addClass('active');
        nextslide++;


    }

    slider();
    var sliderinterval = setInterval(slider, timeout);
    slidertag.mouseleave(function () {
        clearInterval(sliderinterval);
        sliderinterval = setInterval(slider, timeout);
    });

    function gotonext() {

        slider();
    }

    $('#slider .next').click(function () {
        clearInterval(sliderinterval);
        gotonext();
    });

    function gotoprev() {
        nextslide = nextslide - 2;
        slider();
    }

    function gotoslide(index) {
        nextslide = index;
        slider();
    }

    $('#slider .navigator li').hover(function () {
            clearInterval(sliderinterval);
            var index = $(this).index();
            gotoslide(index + 1)
        },
        function () {

        });

    $('#slider .prev').click(function () {
        gotoprev()
    });
        $(".exit,#edame").click(function () {
            $(".addcartalert").fadeOut(100);
            $("#dark").fadeOut(100);
        });
						 
	</script>

