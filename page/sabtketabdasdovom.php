
    <?php
session_start();
?>
    <style>
        .content
        {
            width: 1200px;
            height: 600px;
            margin:0 auto;
            background-color: rgba(0,0,120,.5);
            margin-top:29px;
            box-shadow: 1px 2px 3px #464545;
            padding: 10px;
            font-family: "b nazanin";
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }
        img
        {
            margin-left: 30px;
        }
    </style>
    <div class="content">



    <?php

include "connect.php";
mysqli_query($link,"SET NAMES utf8");
if(isset($_POST['bookname']) && !empty($_POST['bookname'])
   && isset($_POST['authorname']) && !empty($_POST['authorname'])
    && isset($_POST['bookprice']) && !empty($_POST['bookprice'])
    && isset($_POST['bookdetail']) && !empty($_POST['bookdetail'])

)
{
    $bookname=$_POST['bookname'];
    $authorname=$_POST['authorname'];
    $bookprice=$_POST['bookprice'];
    $problem=$_POST['problem'];
    $subject=$_POST['subject'];
    $bookdetail=$_POST['bookdetail'];
    $bookimage=$_FILES['bookimage']['name'];
    $realname=$_SESSION['realname'];

}
else
{
     echo " برخی فیلدها خالی است"."<br/>";
    echo " <img src=../pic/dastdovom/sadbook.png height=300 style=margin-top:100px;>";
    echo "<br/><br/><a href='panel.php?id='{$_SESSION['userid']}>
بازگشت
</a>
    ";
    exit();

}

$targetdir="../pic/dastdovom/";
$targetfile=$targetdir.$_FILES['bookimage']['name'];
$uploadok=1;
$imgtype=pathinfo($targetfile,PATHINFO_EXTENSION);

$check=getimagesize($_FILES['bookimage']['tmp_name']);
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
if($_FILES['bookimage']['size']>900*1024)
{
    echo "حجم عکس باید کم تر از 900 کیلو بایت باشد"."<br/>";

    $uploadok=0;

}

if($uploadok==0)
{
    echo "فایل به سرویس دهنده میزبان انتقال نیافت"."<br/>";
    echo "<img src=../pic/dastdovom/sadbook.png height=400 style=margin-top:100px; >";
      echo "<a href='panel.php?id='{$_SESSION['userid']}>
بازگشت
</a>
    ";
?>

        <?php
}
else
{
    if(move_uploaded_file($_FILES['bookimage']['tmp_name'],$targetfile))
    {

        echo "فایل به سرویس دهنده میزبان انتقال یافت! "."<br/>";

        $sql="insert into dastdovom(bookname,bookimage,authorname,realname,bookprice,problem,types,details) VALUES ('$bookname','$bookimage','$authorname','$realname','$bookprice','$problem','$subject','$bookdetail')";
        if(mysqli_query($link,$sql))
        {
            echo "کتاب شما با موفقیت ثبت شد"."<br/>";
            echo " <img src=../pic/dastdovom/happybook.png height=400px><br/>";
            echo "<br/><br/><a href='panel.php?id='{$_SESSION['userid']}>
بازگشت
</a>
    ";
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
    </div>

