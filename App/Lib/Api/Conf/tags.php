<?php

return array(
	'app_begin' => array(
		'App\\Api\\Behaviors\\CheckSessionId',
	),
	'app_auth' => array(
		'App\\Api\\Behaviors\\CheckAuth'
	)
);