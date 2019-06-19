<meta charset="utf-8">
<!--EASY_UI-->
<link rel="stylesheet" type="text/css" href="./EASY_UI/themes/default/easyui.css"/>
<link rel="stylesheet" type="text/css" href="./EASY_UI/themes/icon.css"/>
<script type="text/javascript" src="./EASY_UI/jquery.min.js"></script>
<script type="text/javascript" src="./EASY_UI/jquery.easyui.min.js"></script>
<script type="text/javascript" src="./EASY_UI/locale/easyui-lang-zh_CN.js"></script>
<!--EASY_UI-->

<body bgcolor="#f0f8ff">
<form action="update.php" method="POST" style="position: relative;top: 20%">
    <table border="1" style="width:1000px;" align="center">
        <tr style="border: 0"><td colspan="6" style="border: 0"><marquee><span style="font-size: 15px;color:black;">欢迎&nbsp;
                        <?php
                        session_start();
                        header("Content-Type: text/html;charset=utf-8");
                        include_once("./conn.php");
                        if(!isset($_SESSION['name'])){
                            echo "<script>alert('没有访问权限，请先进行登陆！');location.href='index.php';</script>";
                        }
                        else{$name=$_SESSION['name']; echo urldecode($name); }?>
                        &nbsp;登录图书管理系统</span></marquee></td></tr>
        <tr>
            <td align="center" colspan="1"><font size="5px"/><input type="text" class="easyui-datebox"  value="<?php echo date("Y/m/d");?>"></td>
            <td align="center" colspan="1"><a href="insert.php" style="text-decoration: none"><font size="5px"/>添加数据</a></td>
            <td align="center" colspan="1"><a href="update.php" style="text-decoration: none"><font size="5px"/>更新/删除数据</a></td>
            <td align="center" colspan="1"><a href="select.php" style="text-decoration: none"><font size="5px"/>浏览数据</a></td>
            <td align="center" colspan="1"><a href="empty.php?name=$name" style="text-decoration: none" onclick='return con();'><font size="5px" color="red"/>注销</a></td>
        </tr>
        <tr>
            <td>ID</td>
            <td>书名</td>
            <td>价格</td>
            <td>出版时间</td>
            <td>类别</td>
            <!--<td>操作</td>-->
        </tr>
        <script>
            function con(){
                if(!confirm("大哥，确定删除???"))
                {
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
        include_once("./page.php");//分页函数
        //---------------分页-----------------
        //---------------分页-----------------

        $search_sql="select * from assmes order by id desc";
        //$keyword="";

        $result_news=mysqli_query($link,$search_sql);

        $total_records=mysqli_num_rows($result_news);

        $page_size=5;
        if(isset($_GET["page_current"]))
        {
            $page_current=$_GET["page_current"];
        }
        else
        {
            $page_current=1;
        }
        $start=($page_current-1)*$page_size;


        //echo $result_sql;
        //$result_set=mysqli_query($link,$result_sql);

        //分页

        if($link)
        {
            $result_sql="select * from assmes order by id desc LIMIT $start,$page_size";
            $result=mysqli_query($link,$result_sql);

            while($mestable=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                //$id=$mestable['id'];
                echo "<tr style='border: 0'><td>".$mestable['id']."</td>";
                echo "<td>".$mestable['name']."</td>";
                echo "<td>".$mestable['price']."</td>";
                echo "<td>".$mestable['time']."</td>";
                echo "<td>".$mestable['class']."</td>";
                //echo "<td><button type='submit' value='修改' name='alt' style='height: 20px;width: 44px'><a href='alt.php?id=$id'>修改</a></button>";
                //echo "<button type='submit' value='删除' name='del' style='height: 20px;width: 44px' onclick='return con()'><a href='update.php?id=$id'>删除</a></button></td>";
                echo "</tr>";
            }

//打印分页导航栏
            echo "<tr><td colspan='6' align='center'>";
            $url= $_SERVER['PHP_SELF'];
            page($total_records,$page_size,$page_current,$url,"");
            //echo $total_records." ".$page_size." ".$page_current." ".$url;
//------------------分页---------------------------
//------------------分页---------------------------

        }
        else{
            echo "<script>alert('连接数据库失败');</script>";
        }
        ?>
        </td></tr></table></form>


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
