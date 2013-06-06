<?php

return array(

	/**
	 * 是否开启用户信息的认证和授权功能
	 * 开启后，主要由相关的行为类来设置
	 *
	 * @var bealoon
	 */
	'AUTH_ON' => true,

	/**
	 * 用户角色，通常必须存在 ROLE_ANONYMOUS, ROLE_MEMEBER, ROLE_ADMIN三个基础角色
	 * 开发者可以根据情况添加新的用户角色
	 *
	 * @var array
	 */
	'AUTH_RULES' => array(
		
		// 匿名用户
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
			'Api:Shop' => true,
			'Api:Product' => true,
			'Api:Version' => true
		),

		// 会员用户，通常指登录后的所有用户
		'ROLE_MEMBER' => array(

			// Home
			'Home' => true,

			// Api
			'Api' => true,
			'Api:Account:login' => false,
			'Api:Account:register' => false,

			// Shopmanager
			'Shopmanager' => array('App\\Shopmanager\\Drivers\\CheckShopkeeper', true), 		// 将认证控制转移到其他类
			'Shopmanager:Account:login' => false,
			'Shopmanager:Account:register' => false,
		),

		// 管理员用户
		'ROLE_ADMIN' => array(
			'Admin' => true,
			'_extends' => array('ROLE_MEMBER') 		// 继承其他用户角色
		)
	)
);