<?php
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

use Command\Command;
use Control\Control;
use Communication\Communication;
use Computers\Computers;
use Intelligence\Intelligence;
use Surveillance\Surveillance;

$command = new Command("HQ Command", "Command");
$control = new Control("HQ Control", "Control");
$communication = new Communication("HQ Comm", "Communication");
$computers = new Computers("HQ Computers", "Computing");
$intelligence = new Intelligence("HQ Intelligence", "Intelligence");
$surveillance = new Surveillance("HQ Surveillance", "Surveillance");

// Menampilkan informasi komponen dengan __toString
echo $command . PHP_EOL;
echo $control . PHP_EOL;

// Menjalankan operasi lainnya
$command->operate();
$command->executeCommand();

$control->operate();
$control->manageControl();

$communication->operate();
$communication->establishCommunication();

$computers->operate();
$intelligence->operate();
$surveillance->operate();
?>
