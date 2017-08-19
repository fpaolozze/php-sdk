<?php

namespace Paggi;

use Paggi\model\Bank;

trait ModelBuild
{
    //key_exists - in_array

    protected function buildObject1($properties){
        //var_dump($properties);
        $class_var = get_class_vars(get_class($this));
        foreach($properties as $obj){
            //if (in_array($key, $class_var)) {
                foreach ($obj as $key => $object){
                    //array_push($class_var,$object);
                    //print_r($class_var);
                    //var_dump($object."<p>");

                }
            //}
        }
    }


    private function buildObject($properties){
        $class_var = get_class_vars(get_class($this));
        foreach($properties as $key => $value){
            //if (key_exists($key, $class_var)) {//key_exists - in_array array_key_exists
                if(!is_null($value)) {
                    $this->{$key} = $value;
                }
            //}
        }
    }
}


?>