<?php

class IndexModel extends Model
{
    public $view = 'index';
    public $title;

    function __construct()
    {	
		parent::__Construct();
		$this->title .= "Главная страница";

    }



    public function index() 
	{
		$result['top_product'] = db::getInstance()->Select('select * from goods order by view desc, date desc limit 3;');
		$result['new_product'] = db::getInstance()->Select('select * from goods order by date desc limit 6;');
		$result['sale_product'] = db::getInstance()->Select('select * from goods where status = "2" order by view desc limit 3;');
		return $result;
    }





}