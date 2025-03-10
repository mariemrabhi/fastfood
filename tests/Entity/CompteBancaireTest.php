<?php
namespace App\Tests\Entity;
use App\Entity\CompteBancaire;
use PHPUnit\Framework\TestCase;
class CompteBancaireTest extends TestCase{
/**
 * @dataProvider compte
 */
public function testMulticompte(int $p, int $o, int $expected): void{
    $compte = new CompteBancaire();
    $compte->setSolde($p);
    $compte->retirer($o);
    $this->assertEquals($expected, $compte->getSolde());
    }
    public function compte(): array{
        return [[100, 50, 50], [500, 50, 450], [10, 5, 5],[5000,1000,4000]];
    }
    public function testRetirer(){
        $compte = new CompteBancaire();
        $compte->setSolde(100);
        $compte->retirer(50);
        $this->assertEquals(50, $compte->getSolde());
    }
    public function testRetirer2(){
        $compte = new CompteBancaire();
        $compte->setSolde( 100);
        $this->expectException('Exception');
        $compte->retirer( 500);
    }
}