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

//        $pth = explode('/',$_GET['path']);
//        $sql = "select * from goods where id_good = '$pth[1]'";
//        $product = db::getInstance()->Select($sql);
//        $result['product'] = $pth;

        return $result;

    }

    public function good(){
//        $pth = explode('/',$_GET['path']);
//        $id_good = (int)$pth[1];
//
//
//        $product = db::getInstance()->Query("select * from goods where id_good = '$id_good' ");
//        $result['product'] = $product;

        $pth = explode('/',$_GET['path']);
        db::getInstance()->Query("update goods set view = view + 1 where id_good = '$pth[1]'");
        $sql = "select * from goods where id_good = '$pth[1]'";
        $product = db::getInstance()->Select($sql);
        $result['product'] = $product;

        return $result;
    }
    
}