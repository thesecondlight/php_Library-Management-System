<meta charset="utf-8">
<body bgcolor="#f0f8ff">
<form name="form" action="register.php" method="POST" style="position: relative;top: 20%">
    <table border="1" bgcolor='#f0f8ff' align="center">
        <tr>
            <td colspan="2" align="center" style="border: 0">
                <h1><a href="index.php" style="color: black;text-decoration: none" >登录</a>/<a href="register.php" style="text-decoration: none">注册</a></h1>
            </td>
        </tr>
        <tr>
            <td width="20%" style="border: 0">用户名：</td>
            <td style="border: 0"><input name="name" type="text"></td>
        </tr>
        <tr>
            <td width="20%" style="border: 0">密码：</td>
            <td style="border: 0"><input name="pwd" type="password" value=""></td>
        </tr>
        <tr>
        <td style="border: 0" colspan="2" align="center">
            <input type="submit" value="提交" name="submit" >
            <input type="reset" value="重置">
        </td>
        </tr>
    </table>
</form>
<!--
表login;
create table login(
name char(255) not null  primary key,
pwd char(255) not NULL
)default charset=utf8;
-->
<?php
/**
 * Created by PhpStorm.
 * User: GGBob
 * Date: 2018/5/31
 * Time: 16:22
 */
header("Content-Type: text/html;charset=utf-8");
include_once("./conn.php");
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $pwd=$_POST['pwd'];
    if($link)
    {
        $insert="insert into login(name,pwd) VALUES('$name','$pwd');";
        $suc=mysqli_query($link,$insert);
        if($suc)
        {
            echo "<script>alert('注册成功！');</script>";
            $name=urlencode($name);
            $url="index.php?name=$name";
            //Header("Location: $url");
            Header("Refresh:0;url=$url");//确认注册成功,然后后跳转到登录页面
            exit;
        }
        else
        {
            echo "<script>alert('输入类型错误/已存在该用户名,请重新输入');</script>";
        }

    }
    else{
        echo "<script>alert('选择数据库失败');</script>";
    }
}
?>