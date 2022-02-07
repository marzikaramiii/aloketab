<?php
$link=mysqli_connect("localhost","root","","bookstore");

if(mysqli_connect_errno())
{
    echo "error is".mysqli_connect_error();
}
mysqli_query($link,"SET NAMES utf8");
    ?>