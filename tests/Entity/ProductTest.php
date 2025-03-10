<?php
namespace App\tests\Entity;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;
class ProductTest extends TestCase{
    public function testDefault(){
        $product = new Product('pomme','food',1);
        $this->assertSame(0.055,$product->computeTVA());
    }
        public function testDefault2 (){
        $product = new Product('pomme','fruit',1);
        $this->assertSame(0.196,$product->computeTVA());
    }
    public function testInvalprice(){
        $p=new Product('pomme','fruit',-5);
        $this->expectException("Exception");
        $p->computeTVA();
    }
        /**
 * @dataProvider pricesForFood
 */
public function testMultiFood($prix,$tva){
    $p=new Product("prduit","food",$prix);
    $this ->assertSame($tva,$p->computeTVA());
    }
    public function pricesForFood(){    
          return [[0,0.0],[1,0.055],[10,0.55],[20,1.1]];
    }
}
?>