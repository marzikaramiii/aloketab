<?php
session_start();
include "panel_menu.php";
include "connect.php";
?>


<style>
    .logo{
        max-width:300px;
        max-height:80px;

    }
    .form{
        width:80%;
        background:white;border:1px solid #d1d1d1;
        margin:50px auto;
        text-align: center;






    }
    h3{
        margin:8px;
        border-bottom:1px solid #d1d1d1;
        font-weight: normal;
    }
    form{
        text-align:center;
        padding:5px 10px;
        margin: 0 auto;
    }
    input[type="text"],textarea{
        width:70%;
        height:15px;
        border:1px solid #d1d1d1;
        border-radius:4px;
        padding: 10px;
        color: #4B4A4A;
        margin-top: 10px;
        text-align:right;
        font-family:'b yekan';
    }
    textarea
    {

        vertical-align: middle;
        min-height: 90px;
        max-height: 90px;
        min-width: 70%;
        max-width: 70%;
    }
    input[type="file"]
    {
     font-family: "b yekan";
    }
    .row{
        margin-top:20px;
    }
    input['password']{
        position:relative;
    }
    .password{
        text-align:right;
        background-image: url(../pic/password.png);
        background-repeat: no-repeat;
        width: 24px;
        height: 24px;
        display: inline-block;
        position: absolute;
        top:16px;
        right:8px;
    }
    .check{
        display:inline-block;
        width: 15px;
        height:15px;
        margin-top: 15px;
        border:1px solid #d1d1d1;
        border-radius:4px;
        position:relative;
        top:5px;
    }
    .under{
        color:#ff9933;
        border-bottom:2px dotted #ff9933;
    }
    .mozo
    {
       vertical-align: middle;

    }
    #mozo
    {
        margin-right: 10px;
    }
    label
    {
        width: 12%;
        display: inline-block;
    }
    input[type="submit"]
    {
        width: 200px;
        height: 30px;
        margin-top: 15px;
        margin-bottom: 15px;
        background-color: #FF9933;
        font-family: "b yekan";
        border: none;
        border-radius: 3px;
        box-shadow: 1px 1px 2px #999999;

    }
    .list td
    {
        border:1px solid #eee;
    }
  .list tr:first-child td
  {
      border: none;
  }
</style>

<?php
$name=$motarjem=$price=$kol=$subject=$discount=$nasher=$pages=$jomleh=$summary=$author=$url=$bookimg="";
$caption="?????? ????????";
if(isset($_GET['action'])&&$_GET['action']=='edit')
{
$id=$_GET['id'];
$updatebook="select * from books where id='$id'";
$result=mysqli_query($link,$updatebook);
$row=mysqli_fetch_array($result);
if($row) {
$name=$row['name'];
$author=$row['author'];
$motarjem=$row['motarjem'];
$price=$row['price'];
$kol=$row['kol'];
$subject=$row['type'];
$discount=$row['discount'];
$nasher=$row['nasher'];
$pages=$row['pages'];
$jomleh=$row['jomleh'];
$summary=$row['summary'];
$bookimg=$row['image'];
$caption="???????????? ????????";
$url="?id=$id&action=edit";
}

}
?>
<div class="form" >
    <h3 style="font-weight: normal">???????????? ???????? ????</h3>

    <form action="bookmanagement_action.php<?php if(!empty($url)){echo $url;}?>" method="post" name="sabt" enctype="multipart/form-data">
            <label>
                ?????? ????????:
            </label>

            <input type="text" placeholder="??????  ???????? ???? ???????? ????????" name="name" id="name"
                   value="<?=$name?>">
        <br>
        <label>
           ?????? ??????????????:
        </label>

        <input type="text" placeholder="??????  ?????????????? ???? ???????? ????????" name="author" id="author"
               value="<?= $author?>">
        <br>
        <label>
            ??????????:
        </label>

        <input type="text" placeholder="?????????? ???? ???????? ????????" name="motarjem" id="motarjem"
               value="<?=$motarjem?>">
        <br>
        <label>
           ????????:
        </label>

        <input type="text" style="text-align: right" placeholder="???????? ???? ???????? ????????" name="price" id="price"
               value="<?=$price?>">
        <br>
        <label>
            ????????????:
        </label>

        <input type="text" placeholder="???????????? ???? ???????? ????????" name="mojod" id="mojod"
               value="<?=$kol?>">
        <br>
        <br>
        <label>
            ?????? ???? ????????:
        </label>

        <input type="file" name="bookimg">
        <?php
        if(!empty($bookimg)) {


            ?>
            <img src="../pic/books/<?=$bookimg?>" width="80" height="110">
            <?php
        }
        ?>
        <br/>

        <label>
          ??????????:
        </label>
        <?php
        $sql="select DISTINCT type from books ";
        $result=mysqli_query($link,$sql);
        $arrsubject=array();
        while ($row=mysqli_fetch_array($result))
        {
            array_push($arrsubject,$row['type']);
        }
        foreach ($arrsubject as $type) {
            if($subject==$type)
            {
                $check="checked";
            }
            else
            {
                $check="";
            }
            ?>
            <label id="mozo">
                <input type="radio" name="subject" value="<?=$type?>" class="mozo" <?=$check?>>
                <?=$type?></label>
            <?php
        }
        ?>
        <br>
        <label>?????????? ??????????:</label>

        <input type="text" placeholder="?????????? ???????? ?????? ?????? ???? ???????? ????????" name="discount" id="discount"
               value="<?=$discount?>">
        <br>
        <label> ????????:</label>

        <input type="text" placeholder="???????? ???? ???????? ????????" name="nasher" id="nasher"
               value="<?=$nasher?>">
        <br>
        <label>?????????? ??????????:</label>
        <input type="text" placeholder="???????? ???? ???????? ????????" name="pages" id="pages"
               value="<?=$pages?>">
        <br>
        <label>???????? ???? ???? ????????:</label>
        <textarea name="jomleh">
            <?=$jomleh
            ?>
        </textarea>
        <br>
        <br>
        <label> ?????????? ???? ???? ????????:</label>
        <textarea name="summary">
            <?=$summary?>
        </textarea>
        <br/>
        <input type="submit" value="<?=$caption?>">
    </form>

    <table style="width: 100%;" cellspacing="0" class="list">
        <tr style="background-color: #cccccc;border:none ">
        <td>???? ????????</td>
       <td>?????? ????????</td>
        <td>?????? ????????</td>
        <td>??????????</td>
        <td>?????? ??????????????</td>
        <td>??????????</td>
        <td>????????</td>
        <td>????????????</td>
        <td>?????????? ??????????</td>
        <td>????????</td>
        <td>?????????? ??????????</td>
        <td>?????????? ??????????????</td>
        </tr>
        <?php
        $sql="select * from books";
        $result=mysqli_query($link,$sql);
        while ($row=mysqli_fetch_array($result)) {
            ?>
            <tr>
            <td><?=$row['id']?></td>
            <td><img src="../pic/books/<?=$row['image']?>" width="40" height="60" style="vertical-align: middle;"> </td>
            <td><?=$row['author']?></td>
                <td><?=$row['type']?></td>
            <td><?=$row['name']?></td>

            <td>
                <?php
                if($row['motarjem']!="")
                {
                    echo $row['motarjem'];
                }
                else
                {
                    echo "-";
                }
                ?>
            </td>
            <td><?=$row['price']?></td>
            <td><?=$row['kol']?></td>
            <td><?=$row['discount']?></td>
            <td><?php
                if($row['nasher']!="")
                {
                    echo $row['nasher'];
                }
                else
                {
                    echo "-";
                }
                ?></td>
            <td>
                <?=$row['pages']?>
            </td>
            <td ">
                <a href="bookmanagement.php?id=<?=$row['id']?>&action=edit" style="color: #FF9933">????????????</a>
                |
                <a href="bookmanagement_action.php?id=<?=$row['id']?>&action=delete" style="color: #398439">??????</a>
            </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>



