<?php
session_start();
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    $_SESSION['id']=$id;
    $_SESSION['login']=true;
}
include "connect.php";
include('panel_menu.php');
?>
<?php
if(isset($_SESSION['type']) && $_SESSION['type']=="public") {
    ?>
    <div class="gallery">
        <h4>کتاب های خریداری شده</h4>
        <hr width="80%" color="#d1d1d1" size="1">
        <?php
        $sql = "select *  from sabadkharid where states='1' AND                                             userid='{$_SESSION['userid']}'";
        $result = mysqli_query($link, $sql);
         $caption2="شما هنوز کتاب خریداری نکردید";
        while ($row = mysqli_fetch_array($result)) {
            $bookid = $row['bookid'];
            $sqlbook = "select * from books where id='$bookid'";
            $result2 = mysqli_query($link, $sqlbook);
            $rowbook = mysqli_fetch_array($result2);
            if ($rowbook) {
                 $caption2="";
                ?>

                <article>
                    <a href="#">
                        <figure>
                            <img src="../pic/books/<?= $rowbook['image'] ?>">
                            <figcaption><?= $rowbook['name'] ?> </figcaption>
                        </figure>
                    </a>
                </article>
                <?php
            }
        }
        echo $caption2;
        ?>
    </div>
    <div class="gallery">
        <h4>کتاب های فروخته شده توسط شما</h4>
        <hr width="80%" color="#d1d1d1" size="1">
        <?php
        include "connect.php";
        mysqli_query($link, "SET NAMES utf8");
        $sql = "select * from dastdovom WHERE realname='{$_SESSION['realname']}'";
        $result = mysqli_query($link, $sql);
        $caption="شما هنوز کتابی ثبت نکردید";
        // $row=mysqli_fetch_array($result);
        $dir = "../pic/dastdovom/";
        while ($row = mysqli_fetch_array($result)) {
            $caption="";
            ?>
            <article>
                <a href="#">
                    <figure>
                        <img src=<?= $dir . $row['bookimage'] ?>>
                        <figcaption><?= $row['bookname'] ?></figcaption>
                    </figure>
                </a>
            </article>
            <?php
        }
        ?>
        <?=$caption?>
    </div>
    <div id="chart">
        <h4>نمودار مطالعه شما</h4>
        <hr width="80%" color="#d1d1d1" size="1">
        <div class="progressbar">
            <span class="title">رمان</span>
            <div class="myprogress">
                <div class="mybar" style="width: 80%;background-color: #FF9900;">

                    <span class="percent">80%</span>
                </div>
            </div>
            <span class="title">فلسفه</span>
            <div class="myprogress">
                <div class="mybar" style="width: 60%;background-color: #ff3333;">

                    <span class="percent">60%</span>
                </div>
            </div>
            <span class="title">تاریخ</span>
            <div class="myprogress">
                <div class="mybar" style="width: 40%;background-color: #3399ff;">

                    <span class="percent">40%</span>
                </div>
            </div>
        </div>
    </div>
    <div id="price">
        <h4>کیف پول</h4>
        <hr width="80%" color="#d1d1d1" size="1">
        <table border="1" cellspacing="0" bordercolor="#eee" id="table">
            <tr>
                <td colspan="2">کیف پول</td>

            </tr>
            <tr>
                <td width="50%">شارژ کیف پول</td>
                <td id="tara">تراکنش ها

                </td>
            </tr>
            <tr>


            </tr>


        </table>

    </div>
    </section>
    <div class="subtable">
        <h4>تراکنش های موفق</h4>
        <span class="close"></span>
        <table cellspacing="0" cellpadding="2" bordercolor="#eee">
            <tr>
                <td>تاریخ</td>
                <td>مبلغ</td>
                <td id="r">توضیحات</td>
            </tr>
            <tr>
                <td>98/5/2</td>
                <td>5,000</td>
                <td>مزرعه حیوانات</td>
            </tr>
            <tr>
                <td>98/4/3</td>
                <td>8,000</td>
                <td>من+تو (صوتی)</td>
            </tr>
            <tr>
                <td>98/4/1</td>
                <td>15,000</td>
                <td>شرمده نباش دختر</td>
            </tr>
        </table>
    </div>
    <div id="dark"></div>
    <?php
}else if(isset($_SESSION['type']) && $_SESSION['type']=="admin") {


    ?>
    <script>
        location.replace("bookmanagement.php");
    </script>
    <?php
}
?>
	<script>
		$("#tara").click(function(){
			$(".subtable").fadeIn(200);
			$("#dark").fadeIn(200);
		})
 $(".close").click(function(){
				  
					$(".subtable").fadeOut(200);
		            $("#dark").fadeOut(200);
									 
									 
									 });
					  
					  
					  
					  
	</script>

