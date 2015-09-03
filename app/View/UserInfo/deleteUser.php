<?php 
$mysqli = new mysqli('localhost', 'root', null, 'test');
if ($mysqli->connect_error) {
	echo $mysqli->connect_error;
	exit();
} else {
	$mysqli->set_charset("utf8");
}
for ($i=0; $i < count($_POST['Ndelete']); $i++) { 
$sql = "DELETE FROM userinfo WHERE id=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $_POST['Ndelete'][$i]);
$stmt->execute();
}
if ($stmt->affected_rows > 0){
	header('Location: displayUserInfo.php');
} else {
	echo "ERROR!!";
}
?>