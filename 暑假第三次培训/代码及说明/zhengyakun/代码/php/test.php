<?php require_once(''Connections/conn.php''); ?>
<?php
$colname_rs = $_GET[''key'']; //获得用户输入
$result = explode('','',$_GET[''key'']);//分解用户输入的多个关键词，存入$result数组
mysql_select_db($database_conn, $conn); //连接数据库
//根据多个关键词构建SQL语句
$query_rs = "SELECT * FROM (";
for($i=0;$i<count($result);$i++) //根据每个搜索关键词构建SQL语句
{
if($i==0) //对第一个关键词，不使用UNION
$query_rs .= "SELECT * FROM searchtable WHERE title LIKE ''%$result[0]%''
OR content LIKE ''%$result[0]%''";
else //对其他关键词，使用UNION连接
$query_rs .= " UNION SELECT * FROM searchtable WHERE title LIKE
''%$result[$i]%'' OR content LIKE ''%$result[$i]%''";
}
$query_rs .= ") T ORDER BY last_access DESC"; //对搜索结果排序
//执行SQL语句
$rs = mysql_query($query_rs, $conn) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
?>
<html>
<head>
<title>Search</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>
<form name="form1" method="get" action="?">
<div align="center">请输入要搜索关键词：
<input name="key" type="text" size="64" value="<?php echo $_GET[''key''] ?>">
<input type="submit" value="Submit">
</div>
</form>
<p align="center"><B>当前关键词：
<?php
for($i=0;$i<count($result);$i++) { //循环显示关键词
echo $result[$i]." ";
}
?></B></p>
<p><hr></p>
<?php if($totalRows_rs>0) do { //显示当前搜索结果 ?>
<p>* <a href="show.php?key=<?php echo $colname_rs ?>&id=<?php echo
$row_rs[''id'']; ?>"><?php echo $row_rs[''title'']; ?></a>(<?php echo
$row_rs[''click'']; ?> | <?php echo $row_rs[''last_access'']; ?>)</p>
<?php } while ($row_rs = mysql_fetch_assoc($rs)); ?>
</body>
</html>
<?php
mysql_free_result($rs);
?>