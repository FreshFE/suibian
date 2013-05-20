<?php

return array(

	// 用户角色开启
	'AUTH_ON' => true,

	// 用户角色
	'AUTH_RULES' => array(
		
		'ROLE_ANONYMOUS' => array(
			'Home' => true,
			'Api:Account' => true,
			'Api:Account:logout' => false
		),
		'ROLE_MEMBER' => array(
			'Home' => true,
			'Api' => true,
			'Api:Account:login' => false,
			'Api:Account:register' => false,
		),
		'ROLE_ADMIN' => array(
			'Admin' => true,
			'_extends' => array('ROLE_ADMIN')
		)
	)
);