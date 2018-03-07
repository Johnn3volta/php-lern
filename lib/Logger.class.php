<?php

class Logger 
{
    public static function Write($message, $echo = false)
    {
        $string = date('Y-m-d H:i:s') . $message . "\n";
        file_put_contents(Config::get('path_logs') . '/log.txt', $string, FILE_APPEND);
        if ($echo) {
            echo $message . "\n";
        }
    }
	
	public static function WriteLogMass($message = "Массив: ", $echo = false)
	{
		$string = date('Y-m-d H:i:s') . $message . " Сессии: " .implode(', ', $_SESSION) . " Куки: " .implode(', ', $_COOKIE) . " post: " .implode(', ', $_POST) . PHP_EOL;
        file_put_contents(Config::get('path_logs') . '/log.txt', $string, FILE_APPEND);
        if ($echo) {
            echo $message . "\n";
        }
	}
}