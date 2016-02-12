<?php
App::uses('AppModel', 'Model');
class Post extends AppModel
{
	 public $validate = array(
			'title' => array('rule' => 'notEmpty', 'message' => 'notEmpty'),
			'body' => array('rule' => 'notEmpty', 'message' => 'notEmpty')
			);
}

?>