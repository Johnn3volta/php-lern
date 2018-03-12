<?php
/**
 * Created by PhpStorm.
 * User: ContentManager5
 * Date: 12.03.2018
 * Time: 10:54
 */

class catalogModel extends Model{

    public $view = 'catalog';
    public $title;

    function __construct(){
        parent::__construct();
        $this->title .=  'Товары';
    }

    public function index($data){
        $result['catalog'] = db::getInstance()->Select("SELECT * FROM WHERE parent_id = '0'");
        return $result;
    }

    public function sub_catalog($data){
        return $result;
    }

    public function doska_serf($data){
        return $result;
    }

    public function product($data){
        return $result;
    }
}