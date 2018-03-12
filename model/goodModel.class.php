<?php
/**
 * Created by PhpStorm.
 * User: ContentManager5
 * Date: 12.03.2018
 * Time: 12:24
 */

class goodModel extends Model{

    public $view = 'good';
    public $title;
    
    function __construct(){
        
        parent::__construct();
        $this->title .= 'Товар';
    }

    public function index(){

        return $result;

    }

    public function good($data){
        $id_good = (int)$data['id'];
        db::getInstance()->Query("update goods set view = view + 1 where id_good = '$id_good'");

        $result['product'] = db::getInstance()->Query("select * from goods where id_good = '$id_good' ");

        return $result;
    }
    
}