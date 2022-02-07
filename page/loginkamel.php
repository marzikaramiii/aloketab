<?php
require('register.php');
$email=$_POST['email'];
$password=$_POST['password'];
if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
{
	?>
<div id="error" style="color:red;"></div>
<script>
	var error=document.getElementById("error");
    var msg="ایمیل صحیح نیست";
    error.innerHTML=msg;

</script>
<?php
}
else {

    include("connect.php");
    $query = "select * from users WHERE email='$email' AND password='$password'";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_array($result);
    if ($row) {

        ?>
        <script>
            var error = document.getElementById("error");
            var msg = "شما قبلا ثبت نام کرده اید";
            error.innerHTML = msg;


        </script>
        <?php
    }

    else {
        $sql = "insert into users(email,password) VALUES ('$email','$password')";
        if (mysqli_query($link, $sql)) {
            $sql="select * from users WHERE email='$email' AND password='$password'";
            $result=mysqli_query($link,$sql);
            $row=mysqli_fetch_array($result);
            if($row) {
                ?>
                <script>
                    window.open('welcome.php?id=<?php  echo $row['id']?>');
                </script>
                <?php
            }
        }
    }
}
	?>