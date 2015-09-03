<!DOCTYPE>
<html lang="ja">
<head>
	<title>照合結果</title>
</head>
<body>
<?php 
$mysqli = new mysqli('localhost', 'root', null, 'test');
if ($mysqli->connect_error) {
	echo $mysqli->connect_error;
	exit();
} else {
	$mysqli->set_charset("utf8");
}
$sql = "SELECT * FROM userinfo WHERE name=?";
if ($stmt = $mysqli->prepare($sql)) {
	$name = $_POST['i_name'];
	$stmt->bind_param('s', $name);
	$stmt->execute();
	if ($stmt->fetch()){
		echo "SUCCESS! YOU=".$name;
	} else {
		echo "ERROR!!";
	}
	$stmt->close();
}
?>
</body>
</html>