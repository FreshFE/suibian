<?php

use Think\Model as Model;

class AdminModel extends Model
{
	protected $_auto = array(
		array('password', 'sha1', 1, 'function')
	);
}