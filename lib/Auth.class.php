<?php
/**
 * Created by PhpStorm.
 * User: ContentManager5
 * Date: 12.03.2018
 * Time: 12:38
 */

class Auth{


    protected static function UserExit(){
        $IdUserSession = $_SESSION['IdUserSession'];
        $sql = "delete from user_auth where hash_cookie = '$IdUserSession'";
        db::getInstance()->Query($sql);


        unset($_SESSION['id_user']);
        unset($_SESSION['IdUserSession']);
        unset($_SESSION['login']);

        setcookie('idUserCookie'.'',time() - 3600 * 24 *7);

        return $isAuth = 0;
    }

    protected static function authWithCredential($username,$password, $rememberme = false){

        $isAuth = 0;

//        $passHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "select id_user,login,pass from users where login ='$username'";
        $user_date = db::getInstance()->Select($sql);

        $IdUserCookie = microtime(true). random_int(100,PHP_INT_MAX);
        $IdUserCookieHash = hash("sha256",$IdUserCookie);

        if($user_date){
            $passHash = $user_date['pass'];
            $id_user = $user_date['id_user'];
            if(password_hash($password,$passHash)){
                $_SESSION['idUserSession'] = $IdUserCookieHash;
                $sql = "insert into users_auth (id_user,hash_cookie,date,prim) value ('$id_user','$IdUserCookieHash', now(), $IdUserCookie)";
                db::getInstance()->Query($sql);

                if($rememberme == true){
                    setcookie('idUserCookie', $IdUserCookieHash,time() + 3600 * 24 * 7, '/');
                }
                $isAuth = 1;
            }else{
                self::UserExit();
            }
        }else{
            self::UserExit();
        }

        return $isAuth;

    }

    protected static  function checkAuthWithSession($IdUserSession){

//        $link = getConnectin();

        $hash_cookie = $IdUserSession;
        $sql = "select users.login, user_auth.* from user_auth INNER JOIN Users on users_auth.id_user = Users.id_user where users_auth.hash_cookie = '$hash_cookie'";

        $user_data = db::getInstance()->Select($sql);

        if($user_data){
            $_SESSION['login'] = $user_data['login'];
            $_SESSION['IdUserSession'] = $IdUserSession;
            $isAuth = 1;
        }else{
            $isAuth = 0;
            self::UserExit();
        }

        return $isAuth;

    }

    protected static function checkAuthWithCookie(){
        $isAuth = 0;

        $hash_cookie = $_COOKIE['idUserCookie'];
        $sql ="select * from users_auth where hash_cookie = '$hash_cookie'";
        $user_data = db::getInstance()->Select($sql);

        if($user_data){
            self::checkAuthWithSession($idUserSession);
            $isAuth = 1;
        }else{
            self::UserExit();
        }

        return $isAuth;
    }

}