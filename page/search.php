
<link href="../file/css/j.css" rel="stylesheet" type="text/css">
<?php
include('header.php');
include "connect.php";
echo "<a href=index.php style=float:right;line-height:38px;color:white>صفحه اصلی</a></div>";
?>

<style>
    #nav
    {
        padding: 0;
        margin: -8px;
    }
    #head #nav
    {
        position: relative;
    }
    #nav >li .menuclick
    {
        color: #ff9933;
        line-height: 59px;
        margin: 0px 28px;


    }
    #nav>li:hover
    {
        background-color: rgba(0,0,0,.5);
    }
    #nav>li
    {
        height: 52px !important;
        float: left;
    }

	.menudown
	{
		left: 37px;
	}
	#nav li
	{
		text-align: center;
	}
    .panel-search
    {
        width: 210px;
        float: right;
    }
    footer
    {
        float: left;
    }
    a{
        color: black;
    }
</style>

<div id="content">

<div class="panel-search" style="color:black;">
  <div class="panel-body" >
      <div class="panel-title" >
          <a>دسته بندی نتایج</a>
      </div>
			<ul class="roman-list">
				<li class="list">
					<a href="#">داستان و رمان ایرانی</a>
				</li>
				<li class="list">
					<a href="#">داستان و رمان خارجی</a>
				</li>
				<li class="list">
					<a href="#">داستان کوتاه</a>
				</li>
				<li class="list">
					<a href="#">داستان و رمان مذهبی</a>
				</li>

				<li class="list">
					<a href="#">عاشقانه</a>
				</li>
				<li class="list">
					<a href="#">داستان و رمان پلیسی</a>
				</li>
				<li class="list">
					<a href="#">داستان و رمان فانتزی</a>
				</li>
				<li class="list">
					<a href="#">داستان و رمان طنز</a>
				</li>
				<li class="list">
					<a href="#">داستان تاریخی</a>
				</li>
			</ul>
		</div>

  <div class="panel-body" style="height: 100px;">
      <div class="panel-title">
          <a>جستجو در نتایج</a>
      </div>
    <input placeholder="کتاب یا نویسنده" value=""
      class="searching">
		
	</div>






	<div class="panel-body" style="margin-top:0;border-top: none;box-shadow: none;direction: rtl">
        <div class="panel-title" >
            <a>نویسنده و مترجم</a>
        </div>

		<div class="nasher">
			<input type="checkbox">
			<lable>مرضیه خسروی</lable>
		</div>
		<div class="nasher">
			<input type="checkbox">
			<lable> آرمان سلطان زاده</lable>
		</div>
		<div class="nasher">
			<input type="checkbox">
			<lable> بهرام ابراهیمی</lable>
		</div>
		<div class="nasher">
			<input type="checkbox">
			<lable> رضا عمرانی</lable>
		</div>
		<div class="nasher">
			<input type="checkbox">
			<lable> گروه نویسندگان </lable>
		</div>
		<div class="nasher">
			<input type="checkbox">
			<lable> زاضیه هاشمی </lable>
		</div>
		<div class="nasher">
			<input type="checkbox">
			<lable>  بهمن فرزانه</lable>
		</div>
		<div class="nasher">
			<input type="checkbox">
			<lable> مهدی غبریی</lable>
		</div>
	</lable>
		</div>

</div>




    <style>
        aside
        {
            float: left;
            width: 82%;
        }
        .books
        {
        text-align: right;
            padding: 0;
        }
        .books li
        {
            margin-top: 15px;
            display: inline-block;
            margin-left: 10px;
            text-align: center;
        }
        .books li a
        {
            display: inline-block;

        }
        .books img{
          width: 175px;
            height: 273px;
        }
        .books p
        {
            margin: 2px;
            font-size: 14px;
        }
        .navigation
        {
            border-bottom: 1px solid #eee;
            direction: rtl;
            font-size: 10px;
            margin-right: 10px;
            padding: 0;
        }
        .navigation li
        {
            font-size: 15px;
            margin-top: 15px !important;
            display: inline-block;
            margin-left: 10px;
        }
        .navigation li.select
        {
            background-color: #FF9933;
            color: white;
            padding: 5px;
            border-radius: 8px;
            margin-bottom: 5px;
        }
        .traingle
        {
            float: none;
            position: static;
            margin-right: 0;
        }
    </style>
	<aside>

    <ul class="navigation">
        <li class="select">پیشنهاد الوکتاب</li>
        <li>پرفروش ترین ها</li>
        <li>ارزان ترین ها</li>

    </ul>
     <ul class="books">
         <?php
         $sql="select * from books";
         $result=mysqli_query($link,$sql);
         while ($row=mysqli_fetch_array($result)) {
             ?>
             <li>
                 <a href="book.php?id=<?=$row['id']?>">
                 <img src="../pic/books/<?=$row['image']?>">
                 <p><?=$row['name']?></p>
                 <p><?=$row['author']?></p>
                  <div id="starsum2">
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
                                <span class="star2 <?=$check?>"></span>
                                <?php
                            }

                            ?>

                        </div>

                 </a>
             </li>
             <?php
         }
         ?>

     </ul>


	</aside>
	
	
	
</div>
</div>
<style>
footer
	{
		float: left!important;
    width: 98.5%;
		
	}
	#socialmedia
	{
		
		padding: 0;
	}
	#socialmedia li
	{
		margin-right: 0px;
	}
	#socialmedia li span
	{
		margin-right: 2px;
	}
	.download ul
	{
		margin-bottom: 0;
		
	}
	.download ul .name
	{
		color:white;
		font-weight: normal;
		font-size: 14px;
	}
	.download ul li span
	{
		margin-right: 3px;
	}
	footer h4
	{
		margin:2px 194px;
	}

</style>
<br/>
<br/>
<br/>
<br/>
<?php
echo "</div>";
include('footer.php');

?>
