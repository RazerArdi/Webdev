<?php
namespace AbstractClasses;

abstract class C4ISRComponent {
    protected $name;
    protected $type;

    public function __construct($name, $type) {
        $this->name = $name;
        $this->type = $type;
    }

    abstract public function operate();

    public function getInfo() {
        return "Component: $this->name, Type: $this->type";
    }

    // Magic Method __toString
    public function __toString() {
        return "C4ISR Component [Name: $this->name, Type: $this->type]";
    }

    // Magic Method __destruct
    public function __destruct() {
        echo "Component {$this->name} of type {$this->type} is being destroyed." . PHP_EOL;
    }
}
?>
