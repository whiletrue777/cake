<?php
require __DIR__ . '/../Model/UserInfo.php';
class UserInfoTest extends PHPUnit_Framework_TestCase {
	public function test_setUp(){
		$sut = new UserInfo();
	$this->assertEquals("UserInfo",  get_class($sut));
	$this->assertEquals("UserInfo", $sut->name);
	}

	public function test_verify(){
	}
}
