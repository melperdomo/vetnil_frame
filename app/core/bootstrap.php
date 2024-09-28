<?php

function dd(...$args) {
    ob_clean();
    echo "<pre>";
    foreach($args as $arg) {
        var_dump($arg);
    }
    echo "</pre>";
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

include __DIR__ . "/../config/error_handler.php";