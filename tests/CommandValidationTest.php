<?php

require 'CommandValidation.php';

/**
 * @property CommandValidation $commandValidation
 * 
 * @author Gleidson Brito Santana <gleidsonbrito dot ads at gmail dot com>
 */
class CommandValidationTest  extends PHPUnit_Framework_TestCase {
    
    protected function setUp() {
        parent::setUp();
        $this->commandValidation = new CommandValidation();
    }
    
    protected function tearDown() {
        parent::tearDown();
        unset($this->commandValidation);
    }
    
    public function testComandoEstaVazio() {
        $command = 'mover de a1 para a2';
        $this->assertFalse($this->commandValidation->isEmpty($command));
        $command = 'mover de h7 para h8';
        $this->assertFalse($this->commandValidation->isEmpty($command));
        
        $this->assertTrue($this->commandValidation->isEmpty(''));
        $this->assertTrue($this->commandValidation->isEmpty(0));
        $this->assertTrue($this->commandValidation->isEmpty(null));
        $this->assertTrue($this->commandValidation->isEmpty(array()));
    }
    
    public function testComandoDeMovimentoValido() {
        $command = 'mover de a1 para a2';
        $this->assertTrue($this->commandValidation->isValidCommand($command));
        $command = 'mover de a1 para b8';
        $this->assertTrue($this->commandValidation->isValidCommand($command));
        $command = 'mover de a8 para h8';
        $this->assertTrue($this->commandValidation->isValidCommand($command));
        $command = 'mover de h8 para a1';
        $this->assertTrue($this->commandValidation->isValidCommand($command));
        
        $command = 'mover de 1a para 2a';
        $this->assertFalse($this->commandValidation->isValidCommand($command));
        $command = 'mover de 11 para 11';
        $this->assertFalse($this->commandValidation->isValidCommand($command));
        $command = 'mover de 8h para 8a';
        $this->assertFalse($this->commandValidation->isValidCommand($command));
        $command = 'mover de hh para aa';
        $this->assertFalse($this->commandValidation->isValidCommand($command));
    }
    
}
