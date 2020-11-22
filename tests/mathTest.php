<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class mathTest extends TestCase
{
    public function testIsMathClass(){
        $this->assertInstanceOf(math::class, new math);
    }

    public function testSum1(): void
    {

        $math = new math();
        $sum = $math->sum(3,6,1);
        $this->assertSame(10, $sum);

        $sum = $math->sum(4);
        $this->assertSame(4, $sum);

        $sum = $math->sum();
        $this->assertSame(0, $sum);
    }

    public function testSumWithFloats(): void
    {

        $math = new math();
        $sum = $math->sum(3.5,6.1,3.2);
        $this->assertSame(12.8, $sum);

        $sum = $math->sum(2.7891);
        $this->assertSame(2.7891, $sum);

        $sum = $math->sum();
        $this->assertSame(0, $sum);
    }

    public function testSumMixed(): void
    {
        $math = new math();
        $sum = $math->sum(3.5,6.1,2,5);
        $this->assertSame(16.6, $sum);

        $sum = $math->sum(2,"2",2.5);
        $this->assertSame(4.5, $sum);

        $sum = $math->sum("Nothing");
        $this->assertSame(0, $sum);
    }

    public function testStringtoFloat(): void
    {
        $math=new math();
        $value = $math->decimal(2);
        $this->assertSame(2,$value);
        $value = $math->decimal(2.12345);
        $this->assertSame(2.12345,$value);
        $value = $math->decimal("2");
        $this->assertSame(2.0,$value);
        $value = $math->decimal("2.1234");
        $this->assertSame(2.1234,$value);
        $value = $math->decimal("2,1234");
        $this->assertSame(2.1234,$value);
        $value = $math->decimal("2.Three");
        $this->assertSame(null,$value);
    }

    public function testIsEven(): void
    {
        $math=new math();
        $this->assertTrue($math->is_even(-2));
        $this->assertTrue($math->is_even(987654));
        $this->assertFalse($math->is_even(-3));
        $this->assertFalse($math->is_even(876543));
        $this->assertTrue($math->is_even(0));
    }

    public function testAverage(): void
    {
        $math = new math();
        $tmp = $math->average(2,4);
        $this->assertSame(3, $tmp);
        $tmp = $math->average(2,3,4,5,6,7,8);
        $this->assertSame(5, $tmp);
        $tmp = $math->average(2.5,4.5);
        $this->assertSame(3.5, $tmp);
    }

    public function testMedian(): void
    {
        $math = new math();
        $tmp = $math->median(2,4,6);
        $this->assertSame(4, $tmp);
        $tmp = $math->median(2,4,6,8);
        $this->assertSame(5, $tmp);
        $tmp = $math->median(2,4.5,6.5,8);
        $this->assertSame(5.5, $tmp);
    }

}
