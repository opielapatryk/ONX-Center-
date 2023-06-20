<?php 
function myAutoload($Pipeline) {
    include 'classes/'.$Pipeline . '.php';
}
spl_autoload_register('myAutoload');

$fun = Pipeline::make_pipeline(
    function($x) {
        return $x * 3;
    },
    function($x) {
        return $x + 6;
    },
    function($x) {
        return $x / 3;
    }
);

echo $fun(8);
?>