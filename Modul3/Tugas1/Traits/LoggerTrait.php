<?php
namespace Traits;

trait LoggerTrait {
    public function log($message) {
        echo "[LOG] " . $message . PHP_EOL;
    }
}
?>
