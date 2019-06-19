<meta charset="utf-8">
<body bgcolor="#f0f8ff">
<form action="alt.php" method="POST" style="position: relative;top: 20%">
<table align="center" style="position: relative;top: 30%">

<?php
/**
 * Created by PhpStorm.
 * User: GGBob
 * Date: 2018/6/2
 * Time: 9:35
 */
include_once("./conn.php");

$id=$_GET['id'];//url
$result=mysqli_query($link,"select * from assmes where id='$id'");
while($mestable=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;I&nbsp;&nbsp;&nbsp;D:&nbsp;&nbsp;&nbsp;<input name='id' value='$id' style='border: 0px'></td><tr>
       <tr><td colspan='4'>&nbsp;&nbsp;&nbsp;书&nbsp;名:&nbsp;&nbsp;&nbsp;<input type='text' size='30' name='name'  value='".$mestable['name']."'></td></tr>
        <tr><td colspan='4'>&nbsp;&nbsp;&nbsp;价&nbsp;格:&nbsp;&nbsp;&nbsp;<input type='text' size='30' name='price'  value='".$mestable['price']."'></td></tr>
        <tr><td colspan='4'>出版时间:<input type='text' size='30' name='time'  value='".$mestable['time']."'></td></tr>
        <tr><td colspan='4'>附属类别:<input type='text' size='30' name='class'  value='".$mestable['class']."'></td></tr>";
    echo "<tr><td><button name='sub'>修改</button></td></tr></table>";
}

if(isset($_POST['sub']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $time=$_POST['time'];
    $class=$_POST['class'];
    echo $id;
    $update="update assmes set name='$name',price='$price',time='$time',class='$class' where id='$id'";
    $suc=mysqli_query($link,$update);
    echo $update;
    if($suc)
    {
        //echo "<script>alert('更新成功！');</script>";
        $url="suc.php";
        Header("Location: $url");
        exit;
        //echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";//更新成功后刷新页面
    }
    else
    {
        echo "<script>alert('更新失败！');</script>";
    }
}

?>

