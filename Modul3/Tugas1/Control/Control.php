<?php
namespace Control;

use AbstractClasses\C4ISRComponent;
use Traits\LoggerTrait;

class Control extends C4ISRComponent implements ControlInterface {
    use LoggerTrait;

    public function __construct($name, $type) {
        parent::__construct($name, $type);
    }

    public function operate() {
        $this->log("Executing control operations for {$this->name}");
    }

    public function manageControl() {
        $this->log("Control managed successfully for {$this->name}");
    }
}
?>
