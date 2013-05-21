<?php

return array(

	// 用户角色开启
	'AUTH_ON' => true,

	// 用户角色
	'AUTH_RULES' => array(
		
		'ROLE_ANONYMOUS' => array(

			// Home
			'Home' => true,

			// Shopmanager
			'Shopmanager:Account:login' => true,
			'Shopmanager:Account:register' => true,
			'Shopmanager:Account:logout' => false,

			// Api
			'Api:Account' => true,
			'Api:Account:logout' => false,
			'Api:Shop' => true
		),
		'ROLE_MEMBER' => array(

			// Home
			'Home' => true,

			// Api
			'Api' => true,
			'Api:Account:login' => false,
			'Api:Account:register' => false,
		),
		'ROLE_SHOPKEEPER' => array(

			// Shopmanager
			'Shopmanager' => array('App\\Shopmanager\\Drivers\\CheckShopkeeper', true),
			// 'Shopmanager' => true,
			'Shopmanager:Account:login' => false,
			'Shopmanager:Account:register' => false,

			'_extends' => array('ROLE_MEMBER')
		),
		'ROLE_ADMIN' => array(
			'Admin' => true,
			'_extends' => array('ROLE_MEMBER')
		)
	)
);