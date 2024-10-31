<?php
namespace Intelligence;

use AbstractClasses\C4ISRComponent;
use Traits\LoggerTrait;

class Intelligence extends C4ISRComponent {
    use LoggerTrait;

    public function __construct($name, $type) {
        parent::__construct($name, $type);
    }

    public function operate() {
        $this->log("Executing intelligence operations for {$this->name}");
    }
}
?>
