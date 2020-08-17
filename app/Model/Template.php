<?php

class Template {
    public static function render($file, $args)
    {
        $template = file_get_contents($file);
        
        foreach ($args as $key => $value) {
            $template = str_replace("{{". $key . "}}", $value, $template);
        }

        return $template;
    }    
}