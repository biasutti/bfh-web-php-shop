<?php


class ErrorMessage
{
    private $code;
    private $message;

    function __construct($code)
    {
        $this->code = $code;
        $this->message = t($code);
    }

    public function render()
    {
        echo "<div class='flex-item flex-size-1 error-message'> $this->message </div>";
    }

    public function getMessage()
    {
        return $this->message;
    }

}