<?php
// this page is receiving value passed from source page
print("<h1>Target/Landing Page</h1>");
$num=$_GET['num'];
print("Your Number is = <input type=text value=".$num."></input>");
print("<br>Please Click <a href=index.php>here</a> to move to source Page");
?>