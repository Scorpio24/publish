<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查找信息</title>
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
	font-family:"MS Serif", "New York", serif;
}
div#black
{
	color:#000;
}
div#white
{
	color:#FFF;
}
div#wrap
{
	width:100%;
	margin:70px auto;
}

</style>

<body background="image/背景.jpg">

<ul id="nav"> 
  <li id="nav"><a href="index.php">首页</a></li> 
  <li><a href="add_article.php"  >添加书籍信息</a></li> 
  <li><a href="search_article.php"  >查询书籍信息</a></li> 
</ul>

<div id="wrap">
<form action="search_result.php" method="post" name="query">
<div id="white">
  <table width=100% border="0">
   <tr>
   	  <td height="50%" colspan="3" align="center">查询出版信息
      </td>    
    </tr>
    <tr>
        <td width="40%" align="right">
        	书籍标题：
        </td>
        <td width="30%" height="31" align="left" valign="middle">
        	<input name="pub_title" type="text" id="pub_title" size="40" />
        </td>
        <td  width="30%" height="31" align="left">
        </td>
    </tr>
    <tr>
        <td width="40%" align="right">
          书籍作者：
        </td>
        <td width="30%" height="31" align="left" valign="middle">
          <input name="pub_author" type="text" id="pub_author" size="40" />
        </td>
        <td  width="30%" height="31" align="left">
        	<input name="author_rship" type="radio" value="and" />并且
        	<input name="author_rship" type="radio" value="or" />或者
        </td>
    </tr>
    <tr>
        <td width="40%" align="right">
          出版年份：
        </td>
        <td width="30%" height="31" align="left" valign="middle">
          <input name="pub_year" type="text" id="pub_year" size="40" />
        </td>
        <td  width="30%" height="31" align="left">
        	<input name="year_rship" type="radio" value="and" />并且
        	<input name="year_rship" type="radio" value="or" />或者
        </td>
    </tr>
    <tr>
        <td width="40%" align="right">
          出版机构：
        </td>
        <td width="30%" height="31" align="left" valign="middle">
          <input name="pub_house" type="text" id="pub_house" size="40" />
        </td>
        <td  width="30%" height="31" align="left">
        	<input name="house_rship" type="radio" value="and" />并且
        	<input name="house_rship" type="radio" value="or" />或者
        </td>
    </tr>
    <tr>
        <td width="40%" align="right">
          出版地：
        </td>
        <td width="30%" height="31" align="left" valign="middle">
          <input name="pub_plaze" type="text" id="pub_plaze" size="40" />
        </td>
        <td  width="30%" height="31" align="left">
        	<input name="plaze_rship" type="radio" value="and" />并且
        	<input name="plaze_rship" type="radio" value="or" />或者
        </td>
    </tr>
    <tr>
        <td width="40%" align="right">
          页数：
        </td>
        <td width="30%" height="31" align="left" valign="middle">
          <input name="pub_paginal" type="text" id="pub_paginal" size="40" />
        </td>
        <td  width="30%" height="31" align="left">
        	<input name="paginal_rship" type="radio" value="and" />并且
        	<input name="paginal_rship" type="radio" value="or" />或者
        </td>
    </tr>
    <tr>
      <td height="40" align="center" colspan="3"><input name="submit" type="submit" onclick="return check(form);" value="查询"/>
      </td>
    </tr>
   </table>
</div>
</form>


<script language="javascript">
function check(form)
{
  var cnt;
  cnt = 0;
	if(form.pub_title.value != "")
	{
		cnt = cnt + 1;
	}
  if(form.pub_author.value != "")
  {
    if (form.author_rship.value == "" && cnt != 0) 
    {
      alert("请选择条件关系!");
      return false;
    };
    cnt = cnt + 1;
  }
  if(form.pub_year.value != "")
  {
    if (form.year_rship.value == "" && cnt != 0) 
    {
      alert("请选择条件关系!");
      return false;
    };
    cnt = cnt + 1;
  }
  if(form.pub_house.value != "")
  {
    if (form.house_rship.value == "" && cnt != 0) 
    {
      alert("请选择条件关系!");
      return false;
    };
    cnt = cnt + 1;
  }
  if(form.pub_plaze.value != "")
  {
    if (form.plaze_rship.value == "" && cnt != 0) 
    {
      alert("请选择条件关系!");
      return false;
    };
    cnt = cnt + 1;
  }
  if(form.pub_paginal.value != "")
  {
    if (form.paginal_rship.value == "" && cnt != 0) 
    {
      alert("请选择条件关系!");
      return false;
    };
    cnt = cnt + 1;
  }
  if(cnt == 0)
  {
    alert("请输入关键字!");
    return false;
  }
	form.submit;
}
</script>

</body>
</html>