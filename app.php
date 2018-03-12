<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Expires: " . date("r"));
session_start();


require_once 'autoload.php'; //подключаем файл с методами автозагрузки классов



print_r($_GET);

try{
    App::init();	//Запускаем статический метод init класса App. В соответствии с внутренними правилами имен находится в файле app.class.php
}
catch (PDOException $e){
    echo "DB is not available";
    var_dump($e->getTrace());
}
catch (Exception $e){
    echo $e->getMessage();
}



