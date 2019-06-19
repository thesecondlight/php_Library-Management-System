<meta charset="utf-8">
<body bgcolor="#f0f8ff">
<form name="form" action="index.php" method="POST" style="position: relative;top: 20%">
    <table border="1" bgcolor="#f0f8ff" align="center">
        <tr>
            <td colspan="2" align="center" style="border: 0">
                <h1><a href="index.php" style="text-decoration: none" >登录</a>/<a href="register.php" style="color: black;text-decoration: none">注册</a></h1>
            </td>
        </tr>
        <tr>
            <td width="20%" style="border: 0">用户名：</td>
            <td style="border: 0"><input name="name" type="text" value="<?php session_start(); header("Content-Type: text/html;charset=utf-8"); include_once("./conn.php"); $name=@$_GET['name']; echo $name; ?>"></td>
        </tr>
        <tr>
            <td width="20%" style="border: 0">密码：</td>
            <td style="border: 0"><input name="pwd" type="password"></td>
        </tr>
        <tr>
            <td style="border: 0" colspan="2" align="center">
                <input type="submit" value="登录" name="submit">
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

if(isset($_POST['submit']))
{
    $name=addslashes($_POST['name']);//
    $pwd=addslashes($_POST['pwd']);
    if($name==""||$pwd=="")
    {
        echo "<script>alert('请输入用户名和密码！');</script>";
    }
    elseif($link)
    {
        $result="select name,pwd from login where name='$name' and pwd='$pwd'";
        $suc=mysqli_query($link,$result);
        if($suc)
        {
            $succ=mysqli_num_rows($suc);//返回结果集中行的列数
            if($succ)
            {

                echo "<script>alert('登录成功！');</script>";
                $name=urlencode($name);
                $_SESSION['name']=$name;
                $url="insert.php?name=$name";
                Header("Location: $url");
                exit;
            }
            else
            {
                echo "<script>alert('用户不存在/密码错误');</script>";
            }
        }
        else{
            echo "<script>alert('系统错误！');</script>";
        }


    }
    else{
        echo "<script>alert('选择数据库失败');</script>";
    }
}
?>