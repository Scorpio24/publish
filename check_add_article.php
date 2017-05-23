<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>处理新信息</title>
</head>

<body>
<?php
	$conn = mysql_connect('localhost','root','root') or die("fail to connnect sql!".mysql_error());
	mysql_select_db('pub_manager',$conn) or die('fail to select database!'.mysql_error());
	mysql_query('set names utf8');
	$title = $_POST[pub_title];
	$s_title = addslashes($title);
	$author = $_POST[pub_author];
	$s_author = addslashes($author);
	$year = $_POST[pub_year];
	$house = $_POST[pub_house];
	$s_house = addslashes($house);
	$plaze = $_POST[pub_plaze];
	$s_plaze = addslashes($plaze);
	$paginal = $_POST[pub_paginal];
	
	$sql = mysql_query("insert into info(title,author,year,pub_house,pub_plaze,paginal) 
		value ('$s_title','$s_author','$year','$s_house','$s_plaze','$paginal')");
	if($sql)
		echo "<script>
		alert('信息添加成功！');
		window.location.href='add_article.php';
		</script>";
	else
		echo "<script>
		alert('信息添加失败！');
		window.location.href='add_article.php';
		</script>";
    mysql_free_result($sql);
    mysql_close($conn);
?>
</body>
</html>