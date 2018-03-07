<?php

class db{

    private static $_instance = null;

    private $db; // Ресурс работы с БД

    /*
     * Получаем объект для работы с БД
	 Объект создается один раз, в независимости от количества попыток создания
     */
    public static function getInstance(){
        if(self::$_instance == null){
            self::$_instance = new db(); //создается объект класса db, файл db.class.php
        }

        return self::$_instance;
    }

    /*
     * Запрещаем копировать объект
     */
    private function __construct(){
    }

    private function __sleep(){
    }

    private function __wakeup(){
    }

    private function __clone(){
    }

    /*
     * Выполняем соединение с базой данных
     */
    public function Connect($user, $password, $base, $host = 'localhost', $port = 3306){
        // Формируем строку соединения с сервером
        $connectString = 'mysql:host=' . $host . ';port= ' . $port . ';dbname=' . $base . ';charset=UTF8;';
        $this->db = new PDO($connectString, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // возвращать ассоциативные массивы
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
            // возвращать Exception в случае ошибки
        ]);
    }

    /*
     * Выполнить запрос к БД
	Если в запрос передаётся хотя бы одна переменная, то этот запрос в обязательном порядке должен выполняться только через подготовленные выражения
	Два варианта, позиционные и именованные плейсхолдеры (метки)
	$res = $pdo->prepare('SELECT name FROM users WHERE email = ?');
	$res->execute(array($email));

	$res = $pdo->prepare('SELECT name FROM users WHERE email = :email');
	$res->execute(array('email' => $email));
     */
    public function Query($query, $params = []){
        $res = $this->db->prepare($query);
        $res->execute($params);

        return $res;
    }

    /*
     * Выполнить запрос с выборкой данных
	 * fetchAll() возвращает массив, который состоит из всех строк, которые вернул запрос. 
     */
    public function Select($query, $params = []){
        $result = $this->Query($query, $params);
        if($result){
            return $result->fetchAll();
        }

    }
}

?>
