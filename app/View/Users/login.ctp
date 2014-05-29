<?php 
	if ($this->Session->check('Message.auth')){
		echo $this->Session->flash('auth');
	}
	echo $this->Form->create('User',array('action'=>'login'));
	echo $this->Form->input('loginname');
	echo $this->Form->password('loginpass');
	echo $this->Form->end('ログイン');
?>