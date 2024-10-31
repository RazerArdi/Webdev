<?php
namespace Command;

use AbstractClasses\C4ISRComponent;
use Traits\LoggerTrait;

class Command extends C4ISRComponent implements CommandInterface {
    use LoggerTrait;

    public function __construct($name, $type) {
        parent::__construct($name, $type);
    }

    public function operate() {
        $this->log("Executing command operations for {$this->name}");
    }

    public function executeCommand() {
        $this->log("Command executed successfully for {$this->name}");
    }

    // Magic Method __toString to provide string representation of Command
    public function __toString() {
        return "Command Component [Name: $this->name, Type: $this->type]";
    }
}
?>
