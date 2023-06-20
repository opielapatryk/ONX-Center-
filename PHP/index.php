<?php 
function myAutoload() {
    include 'classes/Pipeline.php';
    include 'classes/TextInput.php';
    include 'classes/NumericInput.php';
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
$textInput->add('world!');
echo $textInput->getValue(); // Display "Hello world!"
echo '<br>';

$numericInput = new numericInput();
$numericInput->add('a'); // Display "a" is not a number!
$numericInput->add(1); // Display Hello 1


?>