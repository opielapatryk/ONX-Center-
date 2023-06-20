<?php 
    class Pipeline
{
   public static function make_pipeline()
     {
        $args = func_get_args();
        $function = function($arg) use ($args){
            foreach($args as $function) {
                if(!isset($value))
                    $value = $function($arg);
                else
                    $value = $function($value);
        }
        return $value;
     };
     return $function;
 }
}
?>