<?php
namespace Communication;

use AbstractClasses\C4ISRComponent;
use Traits\LoggerTrait;

class Communication extends C4ISRComponent implements CommunicationInterface {
    use LoggerTrait;

    public function __construct($name, $type) {
        parent::__construct($name, $type);
    }

    public function operate() {
        $this->log("Executing communication operations for {$this->name}");
    }

    public function establishCommunication() {
        $this->log("Communication established successfully for {$this->name}");
    }
}
?>
