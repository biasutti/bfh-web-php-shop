<?php


class SuccessMessage
{
    private $code;
    private $message;

    function __construct($code)
    {
        $this->code = $code;
        $this->message = t('success_' . $code);
    }

    public function render()
    {
        echo "<div class='flex-item flex-size-1 success-message'><p>$this->message<a href='#'><span class=\"ui-icon ui-icon-closethick\"></span></a></p></div>";
    }

    public function getMessage()
    {
        return $this->message;
    }

}