<?php

namespace App\Tests\Entity;

use App\Entity\Personne;
use PHPUnit\Framework\TestCase;

class PersonneTest extends TestCase
{
/**
 * @dataProvider presonnes
 */
public function testMultiperson($age,$m){
    $personneMinor = new Personne("John", "Doe", $age);
    $this->assertEquals($m, $personneMinor->category());
    }
    public function presonnes(){    
          return [[12,"mineur"],[18,"majeur"],[40,"majeur"],[1,"mineur"]];
    }
    public function testCategory()
    {
        
        $personneMinor = new Personne("John", "Doe", 17);
        $this->assertEquals("mineur", $personneMinor->category());

       
    }
    public function testCategory1()
    {
        
        $personneAdult = new Personne("Jane", "Doe", 18);
        $this->assertEquals("majeur", $personneAdult->category());
    }
    public function testCategory2()
    {
        $personneSenior = new Personne("Alice", "Smith", 25);
        $this->assertEquals("majeur", $personneSenior->category());
    }
    public function testInvalidAga(){
        $p = new Personne('may', 'daly',-5);
        $this->expectException('Exception');
        $p->category(); 
    }
        
        
}