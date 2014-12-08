<?php

/**
 *
 * @author Gleidson Brito Santana <gleidson dot office at metododerose dot org>
 */
class CommandValidation {

    public function isEmpty($command) {
        return empty($command);
    }

    public function isValidCommand($command) {
        if (!$this->isEmpty($command)) {
            return (boolean) preg_match("/mover de ([a-h][1-8]) para ([a-h][1-8])/", $command);
        }
        return false;
    }

}
