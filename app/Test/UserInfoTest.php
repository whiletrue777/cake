<?php
require __DIR__ . '/../Model/UserInfo.php';
class UserInfoTest extends PHPUnit_Framework_TestCase {
	public function test_setUp(){
		$this->object = new UserInfo();
	}

	public function test_verify(){
	//	$this->assertEquals("UserInfo", $this->UserInfo->$name);
	}
}
