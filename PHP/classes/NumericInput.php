<?php 
    class NumericInput extends TextInput
{
    function add($text) {
        if (is_numeric($text)){
            $this->currentText = $this->currentText . $text;
            echo $this->getValue();
        }else{
            echo '"' . $text . '"' . " is not a number! <br/>";
        }
        
      }
}
?>