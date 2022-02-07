<?php
session_start();
include "panel_menu.php";
include "connect.php";
if(!(isset($_GET['action'])&& $_GET['action']=="delete")) {
    if (isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['author']) && !empty($_POST['author'])
        && isset($_POST['price']) && !empty($_POST['price'])
        && isset($_POST['mojod']) && !empty($_POST['mojod'])
    ) {
        $name = $_POST['name'];
        $author = $_POST['author'];
        $motarjem = $_POST['motarjem'];
        $price = $_POST['price'];
        $kol = $_POST['mojod'];
        $discount = $_POST['discount'];
        $nasher = $_POST['nasher'];
        $pages = $_POST['pages'];
        $jomleh = $_POST['jomleh'];
        $summary = $_POST['summary'];
        $bookimg=$_FILES['bookimg']['name'];
        $subject=$_POST['subject'];


    } else {
        echo "برخی فیلدها خالی هستند";
        exit();
    }
}

if(isset($_GET['action']))
{
    $id=$_GET['id'];
    switch ($_GET['action'])
    {
        case "edit":
            $updatebook="update books set name='$name',
             author='$author',motarjem='$motarjem',
             price='$price',discount='$discount',
             kol='$kol',type='$subject',nasher='$nasher',pages='$pages',jomleh='$jomleh',summary='$summary'
             WHERE id='$id'";

            if(mysqli_query($link,$updatebook))
            {
                ?>

               <div style='border:1px solid #ccc;width: 80%;margin: 20px auto;padding: 10px'>
                   <img src="../pic/tick.png" width="64" height="64" >
                   <br>
                   ویرایش با موفقیت انجام شد!
                   <br>
                   <a href="bookmanagement.php" style="border-bottom: 2px dotted #FF9933;color: #FF9933">بازگشت</a>
               </div>
              <?php
            }
            else
            {
                echo "error";
            }
            break;
        case "delete":
            $book="select * from books WHERE id='$id'";
            $result=mysqli_query($link,$book);
            $row=mysqli_fetch_array($result);
            $bookimg=$row['image'];
            $del="delete from books WHERE id='$id'";
            if(mysqli_query($link,$del))
            {
            unlink("../pic/books/$bookimg");
            ?>
                <div style='border:1px solid #ccc;width: 80%;margin: 20px auto;padding: 10px'>
                    <img src="../pic/tick.png" width="64" height="64" >
                    <br>
                    حذف با موفقیت انجام شد!
                    <br>
                    <a href="bookmanagement.php" style="border-bottom: 2px dotted #FF9933;color: #FF9933">بازگشت</a>
                </div>
<?php
                }
            }
            exit();
    }

$targetdir="../pic/books/";
$targetfile=$targetdir.$_FILES['bookimg']['name'];
$uploadok=1;
$imgtype=pathinfo($targetfile,PATHINFO_EXTENSION);

$check=getimagesize($_FILES['bookimg']['tmp_name']);
if(!($check))
{
    echo "پرونده انتخابی از نوع تصویر نیست"."<br/>";

    $uploadok=0;

}
else
{
    $uploadok=1;
}
if(file_exists($targetfile))
{
    /* $val=strval(rand(50,100000));
     $bookname=pathinfo($targetfile,PATHINFO_FILENAME);
     $bookimage=$bookname.$val.".".$imgtype;*/
    echo "این فایل در سرویس دهنده وجود دارد"."<br/>";

    $uploadok=0;




}
if($imgtype!="png" && $imgtype!="jpg" && $imgtype!="jpeg" && $imgtype!="gif")
{
    echo "پسوند عکس نادرست است"."<br/>";

    $uploadok=0;

}
if($_FILES['bookimg']['size']>900*1024)
{
    echo "حجم عکس باید کم تر از 900 کیلو بایت باشد"."<br/>";

    $uploadok=0;

}

if($uploadok==0)
{
    echo "فایل به سرویس دهنده میزبان انتقال نیافت"."<br/><br/>";
    echo "<img src=../pic/close.png height=64  width=64  style=margin-top:100px; >";
    echo  "<a href=bookmanagement.php style=border-bottom: 2px dotted #FF9933;color: #FF9933>بازگشت</a>";
    ?>

    <?php
}
else
{
    if(move_uploaded_file($_FILES['bookimg']['tmp_name'],$targetfile))
    {

        echo "فایل به سرویس دهنده میزبان انتقال یافت! "."<br/></br>";

        $sql="insert into books(image,name,author,motarjem,price,discount,kol,type,nasher,pages,jomleh,summary,rate) VALUES ('$bookimg','$name','$author','$motarjem','$price','$discount','$kol','$subject','$nasher','$pages','$jomleh','$summary',1)";
        if(mysqli_query($link,$sql))
        {
            echo "کتاب شما با موفقیت ثبت شد"."<br/>";
            echo " <img src=../pic/tick.png height='64' width='64'>";
            echo  "<a href=bookmanagement.php style=border-bottom: 2px dotted #FF9933;color: #FF9933>بازگشت</a>";
        }
        else
        {
            echo "خطا در ثبت اطلاعات در پایگاه داده"."<br/>";
        }
    }

    else
    {
        echo "خطا در ارسال پرونده به سرویس دهنده میزبان"."<br/>";
        ;
    }
}





?>