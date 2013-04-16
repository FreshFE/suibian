<?php

return array(

	'AUTH_ON' => true,

	'AUTH_KEY' => 'USER_AUTH_KEY',

	'AUTH_RULES' => array(

		// Public
		1 => array(
		    'Home/Index/index' => true,

		    'Home/Account/login' => true,
		    'Home/Account/register' => true,
		    'Home/Account/doregister' => true,
		    'Home/Account/forget' => true,

		    'Home/Recommend/index' => true,
		    'Home/Recommend/clear' => true,
		    'Home/Recommend/location' => true,

		    'Admin/Account/login' => true
		),

		// Member
		2 => array(
		    'Home' => true,
		    
		    'Home/Account/login' => false,
		    'Home/Account/register' => false,
		    'Home/Account/doregister' => false,
		    'Home/Account/forget' => false
		),

		// Superadmin
		3 => array(
			'Admin' => true,
			'Admin/Account/login' => false
		)
	),

	// 规则
	'AUTH_ROLES' => array(

		// Public
		1 => array(
			'name' => 'Public',
			'adapter_id' => 1,
			'basetype' => true
		),

		// Member
    	2 => array(
    		'name' => 'Member',
    		'adapter_id' => 2,
    		'basetype' => true
		),

    	// SuperAdmin
		3 => array(
			'name' => 'SpuerAdmin',
			'adapter_id' => array(2,3),
			'basetype' => true
		)
	)
);