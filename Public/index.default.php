<?php

// -------------------------------------------
// 调试模式
// -------------------------------------------
define('APP_DEBUG', true);

// -------------------------------------------
// 调试显示级别，0表示不显示，1表示全部显示，待删除
// -------------------------------------------
ini_set('display_errors', 0);
ini_set('error_reporting', E_ERROR | E_PARSE);

// -------------------------------------------
// 项目核心路径
// -------------------------------------------
define('INDEX_FILE', 'index.php');

// -------------------------------------------
// 项目核心路径
// -------------------------------------------
define('APP_PATH', '../App/');

define('VENDOR_PATH', '../Vendor/');

define('RUNTIME_PATH', '../Runtime/');

define('FRAME_PATH', VENDOR_PATH . 'smartthink/');

// -------------------------------------------
// 加载程序并运行
// -------------------------------------------
require_once FRAME_PATH . 'Smartthink.php';