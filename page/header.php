<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link href="../file/css/index.css" rel="stylesheet" type="text/css"/>
	<script src="../file/js/jquery-3.4.1.min.js" ></script>
	<link href="../file/css/footer.css" rel="stylesheet" type="text/css">

<title>الوکتاب</title>
</head>

	
	<style>
        #head #nav
        {
            left: 327px !important;
        }
        .menuclick:hover
        {
            background-color: rgba(0,0,0,.5);
        }
    </style>
	
	
<body>
	<div id="main">
		<div id="head">
	        
			<img src="../pic/BOOOOK-3.png" id="logo"/>
			
			<ul id="nav">
                <?php
                include "connect.php";
                mysqli_query($link,"SET NAMES utf8");
                if (isset($_SESSION['login']) && $_SESSION['login']===true) {
                    ?>
                  <style>
                      .user
                      {
                          position: relative;
                           left: 1px;
                          top: 8px;
                      }

                      .traingle:before {

                          content: "";
                          display: inline-block;
                          width: 0;
                          height: 0;
                          border-style: solid;
                          border-width: 5px 4.5px 0 4.5px;
                          border-color: #ff9933 transparent transparent transparent;
                      }
                      .traingle
                      {
                          float: left;
                          position: relative;
                          left: 20px;
                      }

                          .user_list
                          {
                              position: absolute;
                              width:185px;
                               direction: rtl;
                              right: 0;
                              padding: 10px;
                              background:linear-gradient(#f1f1f1,white);
                              box-shadow: 1px 1px 2px rgba(0,0,0,.1);
                              display: none;
                              z-index: 50;


                          }
                      .user_list>li{
                          display: block !important;
                          height: 50px !important;
                          width: 100%;
                          border-bottom: 1px solid #d1d1d1;


                      }
                      .user_list>a{
                          margin: 0 !important;
                      }
                      .seepanel
                      {
                          font-size: 12px;
                          float: right;

                          width: 93px !important;
                          height: 23px !important;
                          line-height: 17px !important;
                          margin-left: 0 !important;
                          margin-right: 0 !important;

                      }
                      .user-hover:hover .user_list
                      {
                       display: block !important;
                      }
                  </style>
                <li style="width: 81px;position: relative;" class="user-hover"><a style="direction: rtl; " class="userflash menuclick" >
                        <img src="../pic/user.png" width="25px" height="25px" class="user">
                        <span class="traingle"></span>

                    </a>
                    <ul class="user_list" >
                        <li>
                            <?php
                            $sql="select * from users WHERE email='{$_SESSION['email']}' AND password='{$_SESSION['password']}'";
                            $result=mysqli_query($link,$sql);
                            $row=mysqli_fetch_array($result);
                            ?>
                            <a><img src="../pic/user/<?php  echo $row['gender'].".png" ?>" style="width: 45px;height: 45px;float: right;">
                                <?php echo "<span style=float:right;line-height:29px;height:25px;width:50%; >".$row['realname']."</span>";
                                $id="";
                               if ($row)
                                {
                                    $id=$row['id'];
                                }
                                ?>

                               <a  class="seepanel" href="panel.php?id=<?=$id?>">مشاهده حساب کاربری</a>
                            </a>
                        </li>
                        <li>
                            <a >
                                <img src="../pic/user/supermarket.png" style="width: 25px;height: 25px;float: right;margin-top: 14px;">
                               <a style="float: right;height:60%;width: auto;margin-top: 14px;" href="cart.php?id=<?=$row['id']?>">سفارش های من</a>
                            </a>
                        </li>
                        <li>
                            <a >
                                <img src="../pic/user/logout(1).png" style="width: 25px;height: 25px;float: right;margin-top:14px;margin-left: 5px;">
                                <a style="float: right;height:100%;width: auto;margin-top: 14px;" href="logout.php">خروج</a>
                            </a>
                        </li>
                    </ul>
                </li>
                    <?php
                }
                else{
                    ?>
                <li><a href="login.php" class="menuclick">ورود/ثبت نام
                    </a>
                    <?php
                    }
                    ?>
					
				</li>
				<li><a href="writer.php" class="menuclick">نویسندگان
					</a>

					
				</li>

				<li ><a href="jostojo.php" class="menuclick">فروشگاه</a>

				</li>
				<li><a href="search.php" class="menuclick">کتاب</a>

					<ul class="submenu">
					 <li>
						الکترونیک
						</li>
						<li>
						صوتی
						</li>
						<li>
						درسی/دانشگاهی
						</li>
						<li>
						انگلیسی
						</li>
						<li>
						پادکست
						</li>
						<li>
						در دست چاپ
						</li>
					</ul>
				</li>
				</ul>
		
		
		
		