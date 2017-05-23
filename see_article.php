<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看信息</title>
</head>

<style type="text/css">
ul#nav{ width:100%; height:60px; background:#00A2CA;margin:0 auto} 
ul#nav li{display:inline; height:60px} 
ul#nav li a{display:inline-block; padding:0 180px; height:60px; line-height:60px;
 color:#FFF; font-family:"\5FAE\8F6F\96C5\9ED1"; font-size:16px} 
ul#nav li a:hover{background:#0095BB}/*设置鼠标滑过或悬停时变化的背景颜色*/ 

a:link {
color:#999;
text-decoration: none;
}
a:visited {
color:#999;
text-decoration: none;
}
a:hover {
color:#999;
text-decoration: none;
}
a:active {
color:#999;
text-decoration: none;
}

div
{
	color:#FFF;
	font-family:"MS Serif", "New York", serif;
}

</style>

<body background="image/背景.jpg">

<ul id="nav"> 
  <li id="nav"><a href="index.php">首页</a></li> 
    <li><a href="add_article.php"  >添加书籍信息</a></li> 
    <li><a href="search_article.php"  >查询书籍信息</a></li> 
</ul>

<?php

	$conn = mysql_connect("localhost","root","root") or die("fail to connect sql!".mysql_error());
	mysql_select_db("pub_manager",$conn) or die("fail to select database!".mysql_error());
	mysql_query("set names utf8");
	$id = $_GET[id];
	$sql = mysql_query("select * from info where id=$id");
	$row = mysql_fetch_object($sql);
	$title = stripslashes($row->title);
	$author = stripslashes($row->author);
  $year = $row->year;
  $house = stripslashes($row->pub_house);
  $plaze = stripslashes($row->pub_plaze);
  $paginal = $row->paginal;
	
?>

<div>
  <table width=100% height="203" border="0">
    <tr>
      <td width="393" align="right" >书籍标题：</td>
      <td width="837" height="31"><?php echo $title; ?></td>
    </tr>
    <tr>
      <td width="393" align="right" >书籍作者：</td>
      <td width="837" height="31"><?php echo $author; ?></td>
    </tr>
    <tr>
      <td width="393" align="right" >出版年份：</td>
      <td width="837" height="31"><?php echo $year; ?></td>
    </tr>
    <tr>
      <td width="393" align="right" >出版机构：</td>
      <td width="837" height="31"><?php echo $house; ?></td>
    </tr>
    <tr>
      <td width="393" align="right" >出版地：</td>
      <td width="837" height="31"><?php echo $plaze; ?></td>
    </tr>
    <tr>
      <td width="393" align="right" >页数：</td>
      <td width="837" height="31"><?php echo $paginal; ?></td>
    </tr>
    <tr>
        <td height="40" align="center" colspan="2">
        	<a href="modify.php?id=<?php echo $row->id; ?>" target="new">编辑</a>
        	<a href="delete_article.php?id=<?php echo $row->id; ?>">删除</a>
        </td>
    </tr>
    </table>
</div>

<?php
  mysql_free_result($sql);
  mysql_close($conn);
?>
</body>
</html>