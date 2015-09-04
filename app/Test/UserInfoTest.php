<?php
require __DIR__ . '/../Model/UserInfo.php';
class UserInfoTest extends PHPUnit_Framework_TestCase {
	public function setUp(){
		$this->sut = new UserInfo();
	}

	public function test_verify(){
	$this->assertEquals("UserInfo",  get_class($this->sut));
	$this->assertEquals("UserInfo", $this->sut->name);
	$this->assertFalse($this->sut->id);
	}
}
