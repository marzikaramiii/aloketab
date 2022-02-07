
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ثبت کتاب</title>
	<link href="../file/css/sabtketab.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="content">
	<div class="left">
		<img src="../pic/pngfuel.com.png">
		</div>
		<div class="right">
		<div id="top">
	
</div>


<form id="form1" name="form1" method="post" dir="rtl" action="sabtketabdasdovom.php" enctype="multipart/form-data">
  
    
    <input class="input" type="text" name="bookname"  placeholder="نام کتاب">
    <br>

    <input class="input" type="text" name="authorname"  placeholder="نام نویسنده">
    <br>

    <input class="input" type="text" name="bookprice"  placeholder="قیمت">
  <br>  

    <input class="input" type="text" name="problem"  placeholder="ایرادات کتاب">
   <br>
   
  
 
    <p>
    <label id="mozo">موضوع
    
<input type="radio" name="subject" value="فلسفه" class="mozo" >
    فلسفه</label>
    
    <label style="color:white;">
      <input type="radio" name="subject" value="رمان" id="RadioGroup1_1" class="mozo">
      رمان</label>
    
    <label style="color:white;">
      <input type="radio" name="subject" value="تاریخ" id="RadioGroup1_2" class="mozo">
      تاریخ</label>
    
    <label style="color:white;">
      <input type="radio" name="subject" value="انگیزشی" class="mozo">
      انگیزشی</label>
    
  </p>
    <p>
   
    <textarea name="bookdetail"  id="textarea" placeholder="توضیحات/خلاصه"></textarea>
  </p>
		<p>
    <input type="file" class="input" name="bookimage">
  </p>
     <p>
    <input type="submit" name="submit" id="submit" value="ثبت کتاب شما در الو کتاب">
  </p>

</form>
		</div>
	</div>
</body>
</html>
