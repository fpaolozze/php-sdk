<?php

namespace Paggi;

use Paggi\model\Bank;

trait ModelBuild
{
    //key_exists - in_array

    protected function buildObjectTeste($response)
    {
        foreach ($response as $key => $objeto) {
            if (is_array($objeto)) {
                foreach ($objeto as $name) {
                    //if (property_exists($this, $name)) {
                        $this->{$key} = $objeto;
                    //}
                }
            }
        }
    }

    protected function buildObject($properties)
    {
        foreach ($properties as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}


?>