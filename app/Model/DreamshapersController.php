<?php
App::uses('AppModel', 'Model');
class DreamshapersController extends AppModel
{
	 public $validate = array(
			'category_name' => array('rule' => 'notEmpty', 'message' => 'notEmpty'),
			'body' => array('rule' => 'notEmpty', 'message' => 'notEmpty')
			);
}

?>