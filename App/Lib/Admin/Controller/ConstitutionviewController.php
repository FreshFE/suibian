<?php

use Smartadmin\Controller\Content as Controller;

class ConstitutionviewController extends Controller
{
	protected $model_name = 'ConstitutionImage';

	protected $cover_thumb_name = '150x150';

    protected $category_model = 'Constitution';

    protected $category_fk_name = 'constitution_id';

    protected $category_query_name = 'aid';

    protected $category_id_auto_set = true;

    protected $list_order = 'priority asc';
}