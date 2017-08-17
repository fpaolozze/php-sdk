<?php

namespace Paggi;

trait ModelBuild
{

    public function build($parameters)
    {
        $classe = new \ReflectionObject($this);

        foreach ($parameters as $key => $value) {
            if (array_key_exists($key, $classe->getDefaultProperties())) {
                $this->{$key} = $value;
            }
        }
    }
}


?>