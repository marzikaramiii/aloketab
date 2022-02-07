<?php
include "header.php";
include "connect.php";
echo "<a href=index.php style=float:right;line-height:38px;>صفحه اصلی</a>";
if (isset($_GET['id']))
{
    $id=$_GET['id'];
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
    .content {
        width: 1200px;
        margin: 30px auto;

    }
    .writer
    {
        border: 1px solid #FF9933;
        float: left;
        width: 100%;
        padding: 5px;
        direction: rtl;
        text-align: center;

    }
    .writerimg
    {
        width: 500px;
        height: 300px;
        float: left;
        margin-right: 30px;
    }

   footer
   {
       height: auto;
     padding-bottom: 80px;
   }
    .title
    {
        border-bottom: none;

    }
    p
    {
        text-align: justify;
    }
    .mortabet
    {
        float: right;
        width: 100%;

    }
    .mortabet img
    {
        width: 150px;
        height: 200px;
    }
    .mortabet h3
    {
        width: 80%;
        margin: 0 auto;
        margin-bottom: 10px;
    }
    .book1
    {
        display: inline-block;
    }
</style>
<div class="content">
    <?php
    $sql="select * from author WHERE id='$id'";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_array($result);
    if ($row)
    {
        $name=$row['name'];
    ?>
    <div class="writer">

        <img src="../pic/author/<?=$row['image']?>" class="writerimg">
        <h3 class="title"><?=$row['name']?></h3>
        <p><?=$row['details']?></p>
        <?php
        }


    ?>
    <div class="mortabet">
        <h3>کتاب ها</h3>
        <?php
        $book="select * from books where author='$name'";
        $result2=mysqli_query($link,$book);
        while ($bookrow=mysqli_fetch_array($result2)) {

            ?>
            <a href="book.php?id=<?=$bookrow['id']?>">
                <div class="book1">
                    <img src="../pic/books/<?=$bookrow['image']?>">
                    <br>
                    <span style="color: #4B4A4A"><?=$bookrow['name']?></span>
                </div>
            </a>
            <?php
        }
        ?>
    </div>






</div>
</div>












<?php

include "footer.php";
echo "</body>";
?>
