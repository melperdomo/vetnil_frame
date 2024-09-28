<?php

namespace Core;

use Core\Exceptions\SingeloException;

class View
{
    public static function render(string $view_path, array $params = [])
    {
        $file_path = __DIR__ . '/../views/' . $view_path . ".php";
        if(!file_exists($file_path)) {
            new SingeloException("View $file_path not found.", 1001);
        }
        if(!empty($params)) extract($params);

        $view_layout = static::findLayout($view_path);

        if(!empty($view_layout)) {
            $view_content = $file_path;
            include $view_layout;
        } else {
            include $file_path;
        }
        
        exit;
    }

    private static function findLayout(string $view_path): string
    {
        $layouts_config = include __DIR__ . "/../config/layouts.php";

        foreach($layouts_config as $layout => $views) {
            if(in_array($view_path, $views)) {
                return __DIR__ . "/../views/" . $layout . ".php";
            }
        }
        
        return "";
    }
}