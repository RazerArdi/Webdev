<?php
namespace Computers;

use AbstractClasses\C4ISRComponent;
use Traits\LoggerTrait;

class Computers extends C4ISRComponent {
    use LoggerTrait;

    public function __construct($name, $type) {
        parent::__construct($name, $type);
    }

    public function operate() {
        $this->log("Executing computer operations for {$this->name}");
    }
}
?>
