<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改信息</title>
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

<form name='form1' action="check_modify_ok.php" method="post">
  <div>
  <table width="100%" height="277" border="0">
  	<tr>
   	  <td height="30" colspan="3" align="center">        编辑出版信息
      </td>    
    </tr>
    <tr>
        <td width="35%" align="right">
        	书籍标题：
        </td>
        <td width="65%" height="31" align="left" valign="middle">
        	<input name="pub_title" type="text" id="pub_title" size="40" value="<?php echo $title; ?>" />
        	<input name="id" type="hidden" value="<?php echo $row->id; ?>" />
        </td>
    </tr>
    <tr>
        <td width="35%" align="right">
          书籍作者：
        </td>
        <td width="65%" height="31" align="left" valign="middle">
          <input name="pub_author" type="text" id="pub_author" size="40" value="<?php echo $author; ?>" />
        </td>
    </tr>
    <tr>
        <td width="35%" align="right">
          出版年份：
        </td>
        <td width="65%" height="31" align="left" valign="middle">
          <input name="pub_year" type="text" id="pub_year" size="40" value="<?php echo $year; ?>" />
        </td>
    </tr>
    <tr>
        <td width="35%" align="right">
          出版机构：
        </td>
        <td width="65%" height="31" align="left" valign="middle">
          <input name="pub_house" type="text" id="pub_house" size="40" value="<?php echo $house; ?>" />
        </td>
    </tr>
    <tr>
        <td width="35%" align="right">
          出版地：
        </td>
        <td width="65%" height="31" align="left" valign="middle">
          <input name="pub_plaze" type="text" id="pub_plaze" size="40" value="<?php echo $plaze; ?>" />
        </td>
    </tr>
    <tr>
        <td width="35%" align="right">
          页数：
        </td>
        <td width="65%" height="31" align="left" valign="middle">
          <input name="pub_paginal" type="text" id="pub_paginal" size="40" value="<?php echo $paginal; ?>" />
        </td>
    </tr>

    <tr>
      <td height="40" align="center" colspan="2"><input name="submit" type="submit" value="修改" onclick="return check(form);" />
        <input name="submit2" type="reset" value="重置" /></td>
    </tr>
    </table>
  </div>
</form>

<script language="javascript">
function check(form)
{
  if(form.pub_title.value=="")
  {
    alert("请输入书籍标题！");
    form.pub_title.focus();
    return false; 
  }
  if(form.pub_author.value=="")
  {
    alert("请输入书籍作者！");
    form.pub_author.focus();
    return false;
  }
  if(form.pub_year.value=="")
  {
    alert("请输入出版年份！");
    form.pub_year.focus();
    return false; 
  }
  if(form.pub_house.value=="")
  {
    alert("请输入出版机构！");
    form.pub_house.focus();
    return false; 
  }
  if(form.pub_plaze.value=="")
  {
    alert("请输入出版地！");
    form.pub_plaze.focus();
    return false; 
  }
  if(form.pub_paginal.value=="")
  {
    alert("请输入页数！");
    form.pub_paginal.focus();
    return false; 
  }
	form.submit();
}
</script>
</body>
</html>