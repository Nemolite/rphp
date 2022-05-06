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