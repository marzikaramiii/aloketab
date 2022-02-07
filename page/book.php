<?php
include "header.php";
include "connect.php";
echo "<a href=index.php style=float:right;line-height:38px;>صفحه اصلی</a>";
if(isset($_GET['id']))
{
    $bookid=$_GET['id'];
}
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
    .content
    {
        width: 1200px;
        margin: 0 auto;
        margin-top: 100px;
    }
    .bookimg
    {
        width:200px;
        height: 300px;
        float: right;
        box-shadow:  1px .9px 5px #999999;
    }
    .tozih
    {
   float: right;
        margin-right: 20px;
        direction: rtl;
    }

    .addcart
    {
        width: 200px;
       text-align: center;
        padding: 5px;
        display: inline-block;
        background-color: #FF9933;
        font-size: 15px;
        border-radius: 4px;
        box-shadow: 1px .9px 5px #999999;
        cursor: pointer;
    }
    .type
    {
        width: 100px;
        border:1px solid #FF9933;
        color: #FF9933;
        text-align: center;
        padding: 5px;
        margin: 8px 0px;
        display: inline-block;
    }
    .book
    {
        border: 1px solid #FF9933;
        float: left;
        width: 100%;
        padding: 5px;
    }
    p{
        margin: 2px;
    }
    .mortabet
    {
        float: left;
        width: 100%;
        text-align: center;
    }
    .mortabet img
    {
        width: 150px;
        height: 200px;
    }
    .mortabet p{
        display: inline-block;
    }
    .mortabet .book1
    {
        display: inline-block;
        margin: 0 30px;
    }
    .mortabet a{
        color: black;
    }
    .jomleh
    {
        float: right;
        direction: rtl;
        width: 60%;
        text-align: justify;
       margin-top: 10px;
        height: 100%;
        border: 3px dotted #FF9933;
        padding: 10px;
        margin-right: 5px;
    }
    .summery
    {
        margin-top: 10px;
        direction: rtl;
        text-align: justify;
    }
    h3
    {
        float: left;
        width: 100%;
    }
    .off::after {
        content: "";
        width: 49px;
        height: 1px;
        transform: rotate(-22deg);
        position: absolute;
        top: 15px;
        right: 9px;
        background-color: red;
</style>

<div class="content">

    <div class="book">
        <?php
        if (isset($_GET['type'])) {
            $sql = "select * from dastdovom WHERE id='$bookid'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            if ($row) {
                $bookname=$row['bookname'];
                $nasher=$row['nasher'];
                $price=$row['bookprice'];
                $author=$row['authorname'];
                $pages=$row['pages'];
                $type=$row['types'];
                $problem=$row['problem'];
                $summery=$row['details'];
                $seller=$row['realname'];
                $bookimage=$row['bookimage'];
                $dir="../pic/dastdovom/";
                $id=$row['id'];
            }
        }
        else {
            $sql = "select * from books WHERE id='$bookid'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            $color = "black";
            $class = "";
            if ($row) {
                $bookname=$row['name'];
                $nasher = $row['nasher'];
                $price = $row['price'];
                $author = $row['author'];
                $pages = $row['pages'];
                $type = $row['type'];
                $jomleh = $row['jomleh'];
                $summery = $row['summary'];
                $motarjem = $row['motarjem'];
                $discount = $row['discount'];
                $bookimage=$row['image'];
                $dir="../pic/books/";
                $id = $row['id'];
                if ($row['discount'] > 0) {
                    $color = 'red';
                    $class = 'off';
                }
            }
        }
        ?>
        <img class="bookimg" src="<?= $dir.$bookimage ?>">
        <div class="tozih">
            <div class="title">
                <p class="bookname">
                    <?= $bookname ?>
                </p>
                <span>نویسنده:</span>
                <span style="color: #4B4A4A;"><?= $author ?></span>
                <br>

               <?php
                    if (isset($motarjem) && $motarjem!=="") {

                        ?>
                        <span>مترجم:</span>
                        <span style="color: #4B4A4A;">
                    <?php echo $motarjem; ?>
                       </span>
                        <br>
                        <?php
                    }
                    if (isset($problem) && $problem!="") {
                        ?>
                        <span>مشکلات کتاب:</span>
                        <span style="color: #4B4A4A;"><?= $problem ?> </span>
                        <br>
                        <?php
                    }
                ?>

                <span>تعدادصفحات:</span>
                <span style="color: #4B4A4A;"><?= $pages ?> </span>
                <br>
                <?php
                if (isset($nasher) && $nasher!=="") {

                    ?>
                    <span>ناشر:</span>
                    <span style="color: #4B4A4A;">
                    <?php echo $nasher; ?>
                       </span>
                    <br>
                    <?php
                }
                ?>


                <?php
                if (!(isset($_GET['type'])) && isset($discount) && $discount > 0) {
                    ?>
                    <span>قیمت:</span>
                    <span
                            style="color: forestgreen;"> <?= $price - ($discount * $row['price'] / 100) . "تومان" ?> </span>
                    <span style="font-size:14px;color: red"><img src="../pic/gift.png"
                                                                 style="width: 24px;height: 24px;vertical-align: middle"><?= $discount . "%" . "تخفیف" ?></span>
                    <br>
                    <?php
                }
                ?>
                <span class="type"> <?= $type ?> </span>
                <br>
                <?php
                if(isset($seller))
                {
                    ?>
                <a class="addcart">تماس با <?=$seller?></a>
                <?php
                }
                else {
                    ?>
                    <a id="<?= $id ?>" class="addcart">اضافه به سبد خرید</a>
                    <?php
                }
                ?>
            </div>

        </div>
        <?php
        if (isset($jomleh) && $jomleh!="") {
            ?>
            <div class="jomleh">
         <?= $jomleh;?>
                <br>
                <span style="color: #999999">بخشی از کتاب <?= $row['name'] ?></span>
            </div>
            <?php
        }
        ?>
    </div>


    <div class="summery">
        <h3>خلاصه کتاب</h3>
        <?= $summery . "..." ?>
    </div>
    <div class="mortabet">
        <h3>کتاب های مرتبط</h3>
        <?php
          $sqlmortabet="select * from books where type='$type'";
          $result=mysqli_query($link,$sqlmortabet);

        while ($row = mysqli_fetch_array($result)) {
            ?>


            <a href="book.php?id=<?= $row['id'] ?>">
                <div class="book1">
                    <img src="../pic/books/<?= $row['image'] ?>">
                    <br>
                    <p><?= $row['name'] ?></p>
                    <br>
                    <span style="color: #4B4A4A"><?= $row['author'] ?></span>
                </div>
            </a>


            <?php
        }
        ?>

    </div>


</div>
    <style>
        .addcartalert {
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

        .exit {
            width: 25px;
            height: 25px;
            top: 7px;
            left: 9px;
            position: absolute;
            cursor: pointer
        }

        #sabadkharid {
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

        #basket {
            width: 24px;
            height: 24px;
            vertical-align: middle;
            float: right;

        }

        #bookname {
            position: absolute;
            font-size: 13px;
            text-align: right;
            right: 20px;
            top: 57px;
            width: 271px;
            padding-bottom: 3px;
            border: none !important;

        }

        #tasvieh {
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

        #edame {
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

        #dark {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, .5);
            z-index: 6;
            display: none;
        }
    </style>
    <div class="addcartalert">
        <img src="../pic/-2.png" class="exit">
        <h3 id="sabadkharid">
            سبد خرید شما
            <img id="basket" src="../pic/supermarket.png">
        </h3>
        <h3 id="bookname">
            <span>

            </span>
            به سبد خرید شما اضافه شد.
        </h3>
        <a id="tasvieh" href="cart.php?id=<?= $_SESSION['id'] ?>">تسویه حساب</a>
        <a id="edame">ادامه خرید</a>
    </div>
    <div id="dark">
    </div>
    <script>
        $(".addcart").click(function () {
            var id = $(this).attr('id');
            var bookname = $(this).parents().find(".bookname").html();

            $.ajax({

                url: 'addcart.php',
                type: 'post',
                data: {id: id}

            })
                .done(function (msg) {
                    if (msg == 1) {
                        $(".addcartalert").find("#bookname span").html(bookname);
                        $(".addcartalert").fadeIn(100);
                        $("#dark").fadeIn(100);
                    }
                    else {
                        $(".addcartalert").find("#bookname").html("چیزی به سبد خرید شما اضافه نشد");
                    }

                })
        });
        $(".exit,#edame").click(function () {
            $(".addcartalert").fadeOut(100);
            $("#dark").fadeOut(100);
        });
    </script>


<?php

include "footer.php";

?>
