<?php

return array(

	// 载入配置信息
	'LOAD_EXT_CONFIG' => 'auth,deploy',

	/**
	 * 配置静态资源路径
	 */
	'TMPL_PARSE_STRING' => array(
		
		'@/assets' 	=> '/assets',
		'@/admin' 	=> '/assets/admin',
		'@/images' 	=> '/upload/images'
	),

	/**
	 * 项目缩略图名称和配置类型
	 */
	'PROJ_THUMB_TYPE' => array(

		// 默认样式，宽度，高度，模式
		'thumb' => array(200, 200, 'both'),

		// 产品图片配置
		'400x400' => array(400, 400, 'both'),
		'480x800' => array(480, 800, 'both')
	),
);
