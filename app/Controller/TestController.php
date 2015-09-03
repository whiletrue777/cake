<?php
App::uses('AppController', 'Controller');

class TestController extends AppController {

	public function top() {
		$this->autoLayout = false;
	}
	public function Display(){
		 // set('送信する変数名',$this->Model名->find('条件'));
        $data = $this->UserInfos->find('all');
        $this->set('data', $data);
	}
}
