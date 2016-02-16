<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 14.02.2016
 * Time: 12:07
 */

return [
    'app'=> [
        'url'=>'http://phpauthsystem',
        'hash'=> [
            'algo'=> PASSWORD_BCRYPT,
            'cost'=> 10
        ]
    ],
    'db'=> [
        'driver'=>'mysql',
        'host'=>'127.0.0.1',
        'name'=>'phpauth',
        'username'=>'root',
        'password'=>'',
        'charset'=>'utf8',
        'collation'=>'utf8_unicode_ci',
        'prefix'=>''
    ],
    'auth'=> [
        'session'=>'user_id',
        'remember'=>'user_r'
    ],
    'mail'=>[
        'smtp_auth'=>true,
        'smtp_secure'=>'tls',
        'host'=>'smtp.gmail.com',
        'username'=>'alexbit',
        'password'=>'',
        'port'=>'587',
        'html'=>true,
    ],
    'twig'=> [
        'debug'=>true,
    ],
    'csrf'=> [
        'session'=>'csrf_token'
    ],
];