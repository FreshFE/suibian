<?php

return array(

	// 用户角色开启
	'AUTH_ON' => true,

	// 用户角色
	'AUTH_RULES' => array(
		
		'ROLE_ANONYMOUS' => array(
			'Api:Account' => true
		),
		'ROLE_MEMBER' => array(
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