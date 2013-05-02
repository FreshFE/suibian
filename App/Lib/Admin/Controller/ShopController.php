<?php

use Smartadmin\Controller\Content as Controller;
use Think\Redirect as Redirect;
use Think\Url as Url;
use Think\Config as Config;

class ShopController extends Controller
{
	protected $model_name = 'Shop';

	protected $image_thumb_name = 'thumb';

	protected $cover_thumb_name = 'thumb';

	protected $category_id = 4;
}