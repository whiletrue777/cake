<!DOCTYPE>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ユーザー情報表示</title>
	<script type="text/javascript">
	//PHPが取得してきた情報群をJavascriptで簡易DTOクラスを作って格納
	var userinfoList = [];
	function userInfoDTO (id, name, register_day){
		this.id = id;
		this.name = name;
		this.register_day = register_day;
	}
	//クラスにつく無名関数。省メモリに良いそう
	userInfoDTO.prototype.getId = function(){
		return (this.id);
	};
	userInfoDTO.prototype.getName = function(){
		return (this.name);
	};
	userInfoDTO.prototype.getRegister_day = function(){
		return (this.register_day);
	};
	//削除用チェックダイアログ生成関数
	function deleteNumber(num){
		return "<input type=\"checkbox\" name=\"Ndelete[]\" value=\"" + num + "\">";
	}
	//チェックのついた項目を参照した上で配列を返す
	function edel(){
		var del_array = [];
		for (i = 0; i <= userinfoList.length; i++){
			if(document.fdel.elements[i].checked){
				del_array.push(document.fdel.elements[i].value);
			}
		}
		if(del_array.length == 0){
			alert("No checked");
		} else {
			alert(del_array.length + "個のユーザーデータを削除します");

		}
	}
	//変更ボタン生成関数
	function updateButton(num){
		return "<input type=\"button\" onclick=\"infoPrint(" + num + ")\"";
	}
	//変更ボタンを押された際に該当のユーザー情報をテキストエリアに出力する
	function infoPrint(num){
		fupdate.u_id.value = userinfoList[num].getId();
		fupdate.u_name.value = userinfoList[num].getName();
	}
	</script>
</head>
<body>
	<?php 
	//PHPで取得してきた情報群をjavascriptに渡してリスト化
	echo '<script type="text/javascript">';
	$pdo = new PDO("mysql:dbname=test", "root");
	$st = $pdo->query("SELECT * FROM userInfo");
	//イテレーターか。要解明
	while ($row = $st->fetch()) {
		$id = htmlspecialchars($row['id']);
		$name = htmlspecialchars($row['name']);
		$register_day = htmlspecialchars($row['register_day']);
		echo <<<EOM
var userinfo{$id} = new userInfoDTO("{$id}", "{$name}", "{$register_day}");
userinfoList.push(userinfo{$id});
EOM;
	}
	echo "</script>";
	?>
	<table border="2">
		<tr><th>ID</th><th>名前</th><th>登録日</th><th>削除</th><th>変更</th></tr>
		<script type="text/javascript">
		document.write("<form name=\"fdel\" method=\"post\" action=\"deleteUser.php\">");
		for (var i = 0; i <= userinfoList.length; i++) {
			document.write("<tr><td>" + userinfoList[i].getId() + "</td>");
			document.write("<td>" + userinfoList[i].getName() + "</td>");
			document.write("<td>" + userinfoList[i].getRegister_day() + "</td>");
			document.write("<td>" + deleteNumber(userinfoList[i].getId()) + "</td>");
			document.write("<td>" + updateButton(i) + "</td></tr>");
		};
		</script>
	</table>
		<input type="submit" value="選択された項目を削除" onclick="edel()">
	</form>
	<form method="get" action="DBtest.php">
		<input type="submit" value="トップ画面へ戻る">
	</form>
	<h3>変更用フォーム</h3>
	<form name="fupdate" method="post" action="updateUser.php">
		<input type="text" name="u_id" size="3" readonly><br>
		<input type="text" name="u_name">
		<input type="submit" value="変更する">
	</form>
</body>
</html>