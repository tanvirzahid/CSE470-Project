<?php
use PHPUnit\Framework\TestCase;
class testcas extends TestCase{
    
 
   public function testupdateP(){
        require 'patient_update.php';
        $this->assertEquals('doctor', updateP(800));
        
    }
    
    public function testaddP(){
        require 'patient_add.php';
        $a='Tanvir';
        $this->assertEquals('Tanvir', addP($a));
        
    }
    
    public function testdeleteP(){
        require 'patient_delete.php';
        $this->assertEquals('failed', deleteP(170));
        
    }
  
    
    
}