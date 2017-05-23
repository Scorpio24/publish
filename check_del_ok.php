<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>处理删除操作</title>
</head>

<body>
<?php	
	$conn = mysql_connect("localhost","root","root") or die("fail to connect sql.".mysql_error());
	mysql_select_db("pub_manager",$conn) or die("fail to select database.".mysql_error());
	mysql_query("set names utf8");
	
	$id = $_POST[id];
	$sql = mysql_query("delete from info where id=$id");
	
	if($sql)
		echo "<script>
				alert('信息删除成功');
				history.back();
				window.location.href='index.php';
			  </script>";
	else
		echo "<script>
				alert('信息删除失败');
				history.back();
				window.location.href='delete_article.php';
			  </script>";
	mysql_free_result($sql);
    mysql_close($conn);
?>
</body>
</html>