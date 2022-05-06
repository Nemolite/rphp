<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.05.2022
 * Time: 8:33
 */
include "Helpers.php";
require_once "rb/rb.php";
require "config/config.php";

$h = new Helpers();
$h->show($config);

$dsn = 'mysql:host='.$config['host'].';dbname='.$config['db'];
$username = $config['user'];
$password = $config['pass'];

#R::setup( 'mysql:host=localhost;dbname=mydatabase','user', 'password' );
R::setup( $dsn,$username, $password );

// Проверка подключения
if (R::testConnection()){
    echo "Есть подключение к базе данных";
}
// Замарозка
R::freeze(true);

// Создание таблицы баз данных
$user = R::dispense('user');

$user->surname = 'Vushnyakov';
$user->name = 'Sergey';
$user->patronymic = 'Valerevich';
$user->age = 50;
$user->country = 'Russia';

R::store($user);
//Извлечение
$selecet_user = R::load('user',3);
$h->show($selecet_user);

// Обновление
$upuser = R::load('user',3);
$upuser->age = 51;
R::store($upuser);

R::close();