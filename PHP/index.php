<?php 
function myAutoload() {
    include 'classes/Pipeline.php';
    include 'classes/TextInput.php';
    include 'classes/NumericInput.php';
    include 'classes/RankingTable.php';
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

$numericInput = new numericInput();
$numericInput->add('a'); // Display "a" is not a number!
$numericInput->add(1); // Display Hello 1

$table = new RankingTable(array("Jan","Maks","Monika"));
$table->recordResult("Jan", 2);
$table->recordResult("Maks", 3);
$table->recordResult("Monika", 5);
echo $table->playerRank(1) . '</br>'; //Should return "Monika"

?>