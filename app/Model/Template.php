<?php

namespace App\Model;

class Template {
    public static function render($file, $args)
    {
        $template = file_get_contents($file);
        
        foreach ($args as $key => $value) {
            $template = str_replace("{{". strtoupper($key) . "}}", $value, $template);
        }

        return $template;
    }    
}