<!DOCTYPE>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>DB接続テスト</title>
	<script type="text/javascript">
	//ログインフォームのボタンを禁止状態をテキストボックスへ入力で解除する
	function logincheck(){
	if(document.login.elements[0].value == ""){
		document.login.elements[1].disabled = true;
	} else {
		document.login.elements[1].disabled = false;
	}
	}
	//登録フォームのボタンを禁止状態をテキストボックスへ入力で解除する
	function registercheck(){
	if(document.register.elements[0].value == ""){
		document.register.elements[1].disabled = true;
	} else {
		document.register.elements[1].disabled = false;
	}
	}
	</script>
</head>
<body>
<form name="show" method="post" action="displayUserInfo.php">
	<input type="submit" value="登録者情報の確認">
</form>
<br>
<br>
<br>
<form name="login" method="post" action="verifyUser.php">
	<input type="text" name="i_name" value="" onchange="logincheck()"><br>
	<input type="submit" name="loginButton" value="照合" disabled>
</form>
<br>
<br>
<br>
<form name="register" method="post" action="registerUser.php">
	<input type="text" name="r_user" onchange="registercheck()"><br>
	<input type="submit" name="registerButton" value="登録" disabled>
</form>
</body>
</html>