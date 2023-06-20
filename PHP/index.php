<?php 
function myAutoload() {
    include 'classes/Pipeline.php';
    include 'classes/TextInput.php';
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

echo $fun(8) . '<br>';

$textInput = new TextInput();
$textInput->set_text('world!');
echo $textInput->get_text(); // Display "Hello world!"

?>