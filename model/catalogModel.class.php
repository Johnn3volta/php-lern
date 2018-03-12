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

    public function index(){
        $result['catalog'] = db::getInstance()->Select("SELECT * FROM categories WHERE parent_id = '0'");
        foreach ($result['catalog'] as $key=>$value){

        $result['catalog'][$key]['sub_category'] = db::getInstance()->Select("SELECT * FROM categories WHERE parent_id = '".$value['id_category']."'");
        }
//        echo "<pre>";
//        print_r($result['catalog']);
//        echo "</pre>";

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