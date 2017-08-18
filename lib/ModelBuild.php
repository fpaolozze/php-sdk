<?php

namespace Paggi;

trait ModelBuild
{
    protected function buildObject($properties){
        $class_var = get_class_vars(get_class($this));
        foreach($properties as $key => $value){
            if (key_exists($key, $class_var)) {//key_exists
                $this->{$key} = $value;
            }
        }
    }
}


?>