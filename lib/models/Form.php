<?php


class Form
{
    private $id;
    private $name;
    private $method;
    private $fields;

    public function __construct()
    {
        $fields = array();
    }

    public function addField($input) {
        array_push($fields, $input);
    }

    public function render() {
        echo "<form class=\"flex-size-1 flex-container\" id=\"$this->id\" name=\"$this->name\" method=\"$this->method\">";
        foreach($this->fields as $field) {

        }
        echo "</div>";
    }
}