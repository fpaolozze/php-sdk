<?php

namespace Paggi;

trait ModelBuild
{

    protected function build($parameters)
    {

        //echo json_encode($parameters);

        /*if(is_array($parameters)){
            print_r("ARRAY");
        }else{
            print_r("nnot array");
        }*/

        $classe = new \ReflectionObject($this);
        $class_var = get_class_vars(get_class($this));


        foreach ($parameters as $key => $value) {
            if (in_array($key, $class_var)) {
                print_r($class_var);
                print_r($value);
                $this->{$key} = "kkk";
            //if (!in_array($key, $parameters)) {
                //$this->{$key} = $value;
                //foreach ($key as $objeto){
                    //print_r($value);
                //}
            }
        }
    }
}


?>