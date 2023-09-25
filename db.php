<?php
// $dsn="mysql:host=localhost;charset=utf8;dbname=hw_vote";
// $pdo=new PDO($dsn, 'root', '');
$dsn="mysql:host=localhost;charset=utf8;dbname=s1120205";
$pdo=new PDO($dsn, 's1120205', 's1120205');

session_start();
date_default_timezone_set("Asia/Taipei");

$msg=[
    1=>"本調查為會員限定，請登入後再進行投票",
    2=>"本調查已結束，請進行其它調查"
];


?>