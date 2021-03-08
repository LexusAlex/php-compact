<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ExampleClassTest extends TestCase
{
    public function testOne()
    {
        $obj = new \lexusalex\package\ExampleClass();
        $this->assertEquals('Hello', $obj->exampleMethod());
    }
}