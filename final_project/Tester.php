<?php
use PHPUnit\Framework\TestCase;
class Tester extends TestCase{
    
 
 
    

    
 
    
 
  
  
        
    
   
    
   public function testDeleteDoc(){
            require 'doctor_delete.php';
            $this->assertEquals('failed', deleteDoc(170));
        }
    
    

}