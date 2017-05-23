<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查询结果</title>
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
	width:80%;
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
<table width=100% border="1" cellpadding="1" cellspacing="1" bordercolor="#000" background="image/表格.jpg">
  <tr>
    <td width="200" align="center"><div id="black">标题</div></td>
    <td width="151" align="center"><div id="black">作者</div></td>
    <td width="100" align="center"><div id="black">出版年份</div></td>
    <td width="200" align="center"><div id="black">出版机构</div></td>
    <td width="151" align="center"><div id="black">出版地</div></td>
    <td width="151" align="center"><div id="black">页数</div></td>
    <td width="59" align="center"><div id="black">操作</div></td>
  </tr>
  
<?php

class Msubstr
{
	function csubstr($str, $start, $len)
	{
		$tmpstr = "";
		$strlen = $start + $len;
		for($i = 0; $i < $strlen; $i++)
		{
			if(ord(substr($str, $i, 1)) > 0xa0)
			{
				$tmpstr .= substr($str, $i, 2);
				$i++;
			}
			else
			{
				$tmpstr .= substr($str, $i, 1);
			}
		}
		return $tmpstr;
	}
}

	$conn = mysql_connect("localhost","root","root") or die("fail to connect sql.".mysql_error());
	mysql_select_db("pub_manager",$conn) or die("fail to select database.".mysql_error());
	mysql_query("set names utf8");
		
	$query_condition = "select * from info where";
	$condition_num = 0;
	$pub_title = $_POST[pub_title];
	$pub_author = $_POST[pub_author];
	$a_rship = $_POST[author_rship];
	$pub_year = $_POST[pub_year];
	$y_rship = $_POST[year_rship];
	$pub_house = $_POST[pub_house];
	$h_rship = $_POST[house_rship];
	$pub_plaze = $_POST[pub_plaze];
	$pl_rship = $_POST[plaze_rship];
	$pub_paginal = $_POST[pub_paginal];
	$pa_rship = $_POST[paginal_rship];

	if ($pub_title != "") {
		$query_condition = $query_condition." title like '%".$pub_title."%'";
		$condition_num = $condition_num + 1;
	}
	if ($pub_author != "") {
		if ($condition_num != 0) {
			$query_condition = $query_condition." ".$a_rship;
		}
		$query_condition = $query_condition." author like '%".$pub_author."%'";
		$condition_num = $condition_num + 1;
	}
	if ($pub_year != "") {
		if ($condition_num != 0) {
			$query_condition = $query_condition." ".$y_rship;
		}
		$query_condition = $query_condition." year = ".$pub_year;
		$condition_num = $condition_num + 1;
	}
	if ($pub_house != "") {
		if ($condition_num != 0) {
			$query_condition = $query_condition." ".$h_rship;
		}
		$query_condition = $query_condition." pub_house like '%".$pub_house."%'";
		$condition_num = $condition_num + 1;
	}
	if ($pub_plaze != "") {
		if ($condition_num != 0) {
			$query_condition = $query_condition." ".$pl_rship;
		}
		$query_condition = $query_condition." pub_plaze like '%".$pub_plaze."%'";
		$condition_num = $condition_num + 1;
	}
	if ($pub_paginal != "") {
		if ($condition_num != 0) {
			$query_condition = $query_condition." ".$pa_rship;
		}
		$query_condition = $query_condition." pub_paginal = ".$pub_paginal;
		$condition_num = $condition_num + 1;
	}
echo "$query_condition";
	$sql = @mysql_query($query_condition);
	$row = @mysql_fetch_object($sql);
	if(!$row)
		echo "<font color='#FF0000'>哎呀，没有结果!</font>";
	
	do
	{
		$title = stripslashes($row->title);
		$mc = new Msubstr();
		if(strlen($title) > 19)
		{
			$tt = $mc->csubstr($title,"0","18").'...';
		}
		else
		{
			$tt = $title;
		}
	?>
    	<tr>
            <td><?php echo $tt; ?></td>
            <td><?php echo $row->author;?></td>
            <td><?php echo $row->year;?></td>
            <td><?php echo $row->pub_house;?></td>
            <td><?php echo $row->pub_plaze;?></td>
            <td><?php echo $row->paginal;?></td>
            <td align="center"><a href="see_article.php?id=<?php echo $row->id; ?>" target="new">查看</a></td>
        </tr>
    <?php	
	}while($row = @mysql_fetch_object($sql));
?>
</table>

</div>

</body>
</html>