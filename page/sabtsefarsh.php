<?php
session_start();
if(isset($_POST['codeposti']) && !empty($_POST['codeposti'])
   && isset($_POST['address']) && !empty($_POST['address'])
)
{
    $codeposti=$_POST['codeposti'];
    $address=$_POST['address'];
    $date=date("d-m-Y");
}
include "connect.php";
$sql="select * from users WHERE id='{$_SESSION['userid']}'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result);
if($row)
{
    $realname=$row['realname'];
    $email=$row['email'];
    $mobile=$row['mobile'];

    $sql = "insert into orders VALUES ('0','$realname','$date','$email','$mobile','$address','$codeposti')";
    if (mysqli_query($link, $sql)) {
        $sql = "update sabadkharid set states='1' WHERE userid='{$_SESSION['userid']}'";

        if (mysqli_query($link, $sql)) {

         ?>
            <style>
                body
                {
                    background-color: #eee;
                }
                .sabt
                {
                    width:600px;
                    height: 400px;
                    box-shadow: 1px 2px 3px #d1d1d1;
                    margin:100px auto;
                    font-family: 'b nazanin';
                    direction: rtl;
                    text-align: center;
                    font-size: 24px;
                    background-color: white;
                }
                .sabt img
                {
                    width: 265px;
                    height: 200px;
                    margin-top: 35px;

                }
                a
                {
                    text-decoration: none;
                    border-bottom: 3px dotted #FF9933;
                    color:#ff9933;
                    font-size: 20px;
                }
                p{
                    margin: 3px;
                }
            </style>
            <div class="sabt">
                <img src="../pic/cartcomplete.png">
                <p>دوست عزیز سفارش شما با موفقیت ثبت شد</p>
                <p>ممنون از اعتمادتون به الو کتاب!</p>
                <a href="index.php">بازگشت به صفحه اصلی</a>
            </div>

<?php
            $sql2="select * from sabadkharid WHERE states='1' AND userid='{$_SESSION['userid']}'";
            $result2=mysqli_query($link,$sql2);
            while ($row2=mysqli_fetch_array($result2))
            {
                $qty=$row2['qty'];
                $bookid=$row2['bookid'];
                $sqlforosh="update books set forosh=forosh+$qty where id='$bookid'";
                mysqli_query($link,$sqlforosh);
            }
        }

        }
    }


?>
