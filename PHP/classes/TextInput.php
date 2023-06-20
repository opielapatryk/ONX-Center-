<?php 
    class TextInput
{
    // Properties
    public $currentText = 'Hello ';
    function set_text($additionalText) {
        $this->currentText = $this->currentText . $additionalText;
      }
    function get_text() {
        return $this->currentText;
    }
}
?>