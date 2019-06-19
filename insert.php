<meta charset="utf-8">
<!--EASY_UI-->
<link rel="stylesheet" type="text/css" href="./EASY_UI/themes/default/easyui.css"/>
<link rel="stylesheet" type="text/css" href="./EASY_UI/themes/icon.css"/>
<script type="text/javascript" src="./EASY_UI/jquery.min.js"></script>
<script type="text/javascript" src="./EASY_UI/jquery.easyui.min.js"></script>
<script type="text/javascript" src="./EASY_UI/locale/easyui-lang-zh_CN.js"></script>
<!--EASY_UI-->
<body bgcolor="#f0f8ff">

<form action="insert.php" method="POST" style="position: relative;top: 20%">
    <table border="1" style="width: 1000px;" align="center">
        <tr style="border: 0"><td colspan="6" style="border: 0"><marquee><span style="font-size: 15px;color:black;">欢迎&nbsp;
                        <?php
                        session_start();
                        header("Content-Type: text/html;charset=utf-8");
                        include_once("./conn.php");
                        if(!isset($_SESSION['name'])){
                            echo "<script>alert('没有访问权限，请先进行登陆！');location.href='index.php';</script>";
                        }
                        else{$name=$_SESSION['name']; echo urldecode($name); }?>&nbsp;登录图书管理系统</span></marquee></td></tr>
        <tr>
            <td align="center" colspan="1"><font size="5px"/><input type="text" class="easyui-datebox"  value="<?php echo date("Y/m/d");?>"></td>
            <td align="center" colspan="1"><a href="insert.php" style="text-decoration: none"><font size="5px"/>添加数据</a></td>
            <td align="center" colspan="2"><a href="update.php" style="text-decoration: none"><font size="5px"/>更新/删除数据</a></td>
            <td align="center" colspan="1"><a href="select.php" style="text-decoration: none"><font size="5px"/>浏览数据</a></td>
            <td align="center" colspan="1"><a href="empty.php?name=$name" style="text-decoration: none" onclick='return con();'><font size="5px" color="red"/>注销</a></td>
        </tr>
        <tr><td align="center" colspan="6" style="border: 0;">&nbsp;&nbsp;&nbsp;书&nbsp;名:&nbsp;&nbsp;&nbsp;<input type="text" size="30" name="name"></td></tr>
        <tr><td align="center" colspan="6" style="border: 0;">&nbsp;&nbsp;&nbsp;价&nbsp;格:&nbsp;&nbsp;&nbsp;<input type="text" size="30" name="price"></td></tr>
        <tr><td align="center" colspan="6" style="border: 0;">出版时间:<input type="text" size="30" name="time"></td></tr>
        <tr><td align="center" colspan="6" style="border: 0;">附属类别:<input type="text" size="30" name="class"></td></tr>
        <tr>
            <td align="center" colspan="6" style="border: 0;"><input type="submit" name="submit" /> <input type="reset" /></td>
        </tr>
    </table>
</form>
<script>
    function con(){
        if(confirm("大哥，是否注销？"))
        {
            <?php
            //session_unset($_SESSION['name']);
            //session_destroy();
                //$_SESSION['name']=null;//empty.php
            ?>
        }
        else{
            return false;
        }
    }
</script>
<?php
/**
 * Created by PhpStorm.
 * User: 2603
 * Date: 2018/5/24
 * Time: 15:03
 */
include_once("./conn.php");
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $price=$_POST['price'];
    $time=$_POST['time'];
    $class=$_POST['class'];

    if($link)
    {
        $insert="insert into assmes(name,price,time,class) VALUES('$name','$price','$time','$class');";
        $suc=mysqli_query($link,$insert);
        if($suc)
        {
            echo "<script>alert('提交成功！');</script>";
        }
        else
        {
            echo "<script>alert('输入类型错误，请重新输入');</script>";
        }
       
    }
    else{
        echo "<script>alert('选择数据库失败');</script>";
    }
}



?>

<!--数据库的创建
create database mes;
use mes;
create table assmes(
id int(255) not null auto_increment primary key,
name char(255),
price varchar(255) not NULL,
time int(255) not NULL,
class char(255)
)default charset=utf8;

->

