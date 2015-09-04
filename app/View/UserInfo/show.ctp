<!DOCTYPE html>
<html>
<head>
	<title>情報一覧</title>
</head>
<body>
	<table>
		<?php 
		echo $this->Html->tableHeaders(array('ID', '名前', 'day'/*,'削除'*/)) . PHP_EOL;
		foreach ($data as $data1) {
			echo $this->Html->tableCells($data1['UserInfo'], array('id'), array('name'), array('register_day'), true);
		}
		?>
	</table><br><br>
	<?php 
		echo $this->Form->create('UserInfo',array('action'=>'del'));
		echo $this->Form->input('削除する_iD',array('type'=>'text',
			'name'=>'DName'));
		echo $this->Form->end("入力されたIDを削除");
		?>
<h1>TEST</h1>
<br>
<br>
<?php 
echo $this->Form->create('UserInfo',array('action'=>'update'));
	echo $this->Form->input('変更するデータの_iD', array('type' => 'text',
		'name' => 'UId'));
		echo $this->Form->input('変更後の名前',array('type'=>'text',
			'name'=>'UName'));
		echo $this->Form->end("上記内容で更新");
?>

</body>
</html>
