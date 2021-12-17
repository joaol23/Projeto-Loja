<?php 
define("DB_HOST","boaventura.mysql.dbaas.com.br");
define("DB_NAME","boaventura");
define("DB_USER","boaventura");
define("DB_PWD","orombas2021");

spl_autoload_register(function($classname){
    $namespace = 'Classes/APP/'.$classname.'.php';

    if(file_exists($namespace)){
        require $namespace;
    }
});

?>