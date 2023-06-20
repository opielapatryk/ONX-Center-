<?php 
    class TextInput
{
    // Properties
    public $currentText = 'Hello ';
    function add($text) {
        $this->currentText = $this->currentText . $text;
      }
    function getValue() {
        return $this->currentText . '</br>';
    }
}
?>