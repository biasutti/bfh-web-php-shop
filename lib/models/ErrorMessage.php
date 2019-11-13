<?php


class ErrorMessage
{
    private $code;
    private $message;

    function __construct($code)
    {
        $this->code = $code;
        $this->message = t('error_' . $code);
    }

    public function render()
    {
        echo "<div class='flex-item flex-size-1 error-message'><p>$this->message<span class=\"ui-icon ui-icon-closethick\"></span></p></div>";
    }

    public function getMessage()
    {
        return $this->message;
    }

}