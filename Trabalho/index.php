<?php

require 'config.php';

$page = filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING);
$filename = 'View/'. $page.'.php';


if(file_exists($filename)){
    require $filename;
}else{
    require 'View/home.php';
}