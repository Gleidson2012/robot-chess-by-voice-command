<?php
require './vendor/autoload.php';
require './src/CommandValidation.php';

$command = filter_input(INPUT_GET, 'command');
$commandValidation = new CommandValidation();

if ($commandValidation->isValidCommand($command)) {
    $matches = null;
    preg_match("/\w?([a-h] ?[1-8]) para ([a-h] ?[1-8])/", $command, $matches);
    exec("/usr/bin/arduino-serial -q -p /dev/ttyACM0 -s {$matches[1]}{$matches[2]}z");
    require './views/valid_command.php';
} else {
    exec("/usr/bin/arduino-serial -q -p /dev/ttyACM0 -s ffffz");
    require './views/invalid_command.php';
}