<?php 

namespace Console\Tests;

use PHPUnit\Framework\TestCase;
use Console\StringArgument;

final class StringArgumentTest extends TestCase
{
    /**
     * the string
     * 
     * @var string
     */
    private $string = 'hello world';

    protected static function getMethod($name)
    {
        $class = new \ReflectionClass(new StringArgument());
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
    
    public function testUpperCase(): void
    {
        $method = self::getMethod('uppercase');
        $object = new StringArgument();

        $this->assertEquals($method->invokeArgs($object, [$this->string]), 'HELLO WORLD');
    }

    public function testAlternate(): void
    {
        $method = self::getMethod('alternate');
        $object = new StringArgument();

        $this->assertEquals($method->invokeArgs($object, [$this->string]), 'hElLo wOrLd');
    }

    public function testExportToCsv(): void
    {
        $method = self::getMethod('export');
        $object = new StringArgument();

        $this->assertEquals($method->invokeArgs($object, [$this->string]), 'CSV created!');
    }

    public function testHandleWithArgumentstring(): void
    {
        $method = self::getMethod('handle');
        $object = new StringArgument();

        $property = new \ReflectionProperty(StringArgument::class, "arguments");
        $property->setAccessible(true);
        $property->setValue($object, ['string' => $this->string]);

        $message  = "HELLO WORLD\n";
        $message .= "hElLo wOrLd\n";
        $message .= 'CSV created!';
        
        $method->invokeArgs($object, []);
        $this->expectOutputString($message);
    }

    public function testHandleWithoutArgumentstring(): void
    {
        $method = self::getMethod('handle');
        $object = new StringArgument();

        $method->invokeArgs($object, []);
        $this->expectOutputString('please enter a valid argument' . "\n");
    }
}