<?php
require_once 'dump.php';

$arr = array();
$arr['foo'] = 'bar';
$obj = new stdClass;
$obj->foo = 'bar';
dump('foo bar');
dump('{"foo":"bar"}');
dump($arr);
dump($obj);
$obj->arr = $arr;
dump(serialize($obj));
dump(true);
dump($arr, $obj);
?>