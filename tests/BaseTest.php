<?php 

namespace Console\Tests;

use PHPUnit\Framework\TestCase;
use Console\Base;

final class BaseTest extends TestCase
{
    protected static function getMethod($name)
    {
        $class = new \ReflectionClass(new Base());
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
    
    public function testOutputToConsoleWithLineBreak(): void
    {
        $method = self::getMethod('outputToConsole');
        $object = new Base();

        $message = 'just a message!';
        $method->invokeArgs($object, [$message]);
        $this->expectOutputString($message . "\n");
    }

    public function testOutputToConsoleWithoutLineBreak(): void
    {
        $method = self::getMethod('outputToConsole');
        $object = new Base();

        $message = 'just a message!';
        $method->invokeArgs($object, [$message, false]);
        $this->expectOutputString($message);
    }
}