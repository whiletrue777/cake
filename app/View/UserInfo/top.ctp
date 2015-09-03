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
<div>
		<?php 
		echo $this->Form->create('UserInfo',array('action'=>'show'));
		echo $this->Form->end("登録者情報の確認");
		?>
<!--
<form name="show" method="post" action="UserInfo/display">
	<input type="submit" value="登録者情報の確認">
</form>-->
</div>
<br>
<br>
<br>
<?php 
		echo $this->Form->create('UserInfo',array('action'=>'verify'));
		echo $this->Form->input('名前',array('type'=>'text',
			'name'=>'IName'));
		echo $this->Form->end("登録者情報の照合");
		?>
<!--
<form name="login" method="post" action="/user_infos/verify">
	<input type="text" name="i_name" value="" onchange="logincheck()"><br>
	<input type="submit" name="loginButton" value="照合" disabled>
</form>-->
<br>
<br>
<br>
<?php 
		echo $this->Form->create('UserInfo',array('action'=>'add'));
		echo $this->Form->input('新規登録名',array('type'=>'text',
			'name'=>'RName'));
		echo $this->Form->end("登録");
		?>
		<!--
<form name="register" method="post" action="registerUser.php">
	<input type="text" name="r_user" onchange="registercheck()"><br>
	<input type="submit" name="registerButton" value="登録" disabled>
</form>-->
<br>
<br>
<br>

</body>
</html>
