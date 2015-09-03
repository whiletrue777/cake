<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class UserInfosController extends AppController {
	    // コントローラー名
    public $name = 'UserInfo';
    // モデルを指定しない
    public $uses = array('UserInfo','user_infos');

    public $request;

	public function top() {
		$this->autoLayout = false;

	}
	public function show($id = 0){
		//set('送信する変数名',$this->Model名->find('条件'));
		$this->autoLayout = false;
		$data = $this->UserInfo->find('all');
        $this->set('data', $data);
    
	}
	public function verify(){
		if($this->request->is('post')) {
			$this->autoLayout = false;
			if($this->UserInfo->find('count',array('conditions'=>
				array(
					'UserInfo.name' => $this->data["IName"]))) > 0) {
				printf("SUCCESS!");
		} else{
			printf('ログイン失敗');
		}
	}
}

	public function add(){
		$this->UserInfo->create();
		var_dump($this->data['RName']);
		$this->UserInfo->save(array('UserInfo' => array('name' => $this->data['RName'],
			'register_day' => date( "Y/m/d", time() ))));
		$this->setAction('show'); 
		$this->redirect('show');
	}

	public function del(){
		if($this->UserInfo->delete($this->data['DName'])) {
			$this->setAction('show'); 
			$this->redirect('show');
		} else{
			printf("指定されたIDが見つかりません");
		}
	}

	public function update(){
		debug($this->data['UId']);
		debug($this->data['UName']);
		$this->UserInfo->id = $this->data['UId'];
		if(!$this->UserInfo->exists()){
			printf("指定されたIDが見つかりません");
		}
		if($this->UserInfo->save(array('UserInfo' => array('id' => $this->data['UId'],
			'name' => $this->data['UName'],
			'register_day' => date( "Y/m/d", time()))))){
			$this->setAction('show'); 
			$this->redirect('show');
		} else{
			printf("更新失敗");
		}
	}
}
?>
