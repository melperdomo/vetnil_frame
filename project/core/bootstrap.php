<?php

function dd(...$args) {
    
    @ob_clean();

    if(php_sapi_name() != 'cli') echo "<pre>";
    
    foreach($args as $arg) {
        var_dump($arg);
    }
    
    if(php_sapi_name() != 'cli') echo "</pre>";
    die;
}

spl_autoload_register(function ($class)
{
    $baseDir = __DIR__ . "/../";
    $class = strtolower($class[0]) . substr($class, 1);
    $file = $baseDir . $class . '.php';
    $file = str_replace("\\", "/", $file);

    if (file_exists($file)) {
        require_once $file;
    }
});

require_once __DIR__ . '/../vendor/autoload.php';

\Core\Helper\Env::load();

session_start();