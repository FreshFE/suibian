<?php

use Think\Model as Model;

class UserModel extends Model
{
	protected $_auto = array(
		array('password', 'sha1', 3, 'function'),
		array('createline', 'time', 1, 'function')
	);

	protected $_validate = array(
		array('email', 'require', 'NO_EMAIL'),
		array('username', 'require', 'NO_USERNAME'),

		array('email', 'unique', 'EXTIS_EMAIL', 1, 'unique'),
		array('username', 'unique', 'EXTIS_USERNAME', 1, 'unique')
	);
}