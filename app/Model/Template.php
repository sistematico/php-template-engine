<?php

namespace Templates\Model;

class Template {
    public static function render($file, $args)
    {
        $template = file_get_contents(TEMPLATES . $file . '.html');
        
        foreach ($args as $key => $value) {
            $template = str_replace("{{". strtoupper($key) . "}}", $value, $template);
        }

        return $template;
    }    
}