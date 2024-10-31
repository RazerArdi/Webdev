<?php
namespace Surveillance;

use AbstractClasses\C4ISRComponent;
use Traits\LoggerTrait;

class Surveillance extends C4ISRComponent {
    use LoggerTrait;

    public function __construct($name, $type) {
        parent::__construct($name, $type);
    }

    public function operate() {
        $this->log("Executing surveillance operations for {$this->name}");
    }
}
?>
