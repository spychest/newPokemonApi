<?php

namespace App\Tests\Entity;

use App\Entity\Type;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    private CONST NAME = 'Plante';

    public function testInstance()
    {
        $type = $this->getType();
        $this->assertInstanceOf(Type::class, $type, 'The type MUST be an instance of Type class.');
    }

    public function testName()
    {
        $type = $this->getType();
        $this->assertNotNull($type->getName(), 'The name of the type CANNOT be null');
        $this->assertIsString($type->getName(), 'The name of the type MUST be a string');
        $this->assertEquals(
            self::NAME,
            $type->getName(),
            'The expected name and the received name are not the same. Expected: '.self::NAME.', received: '.$type->getName()
        );
    }

    private function getType(): Type
    {
        return new Type(self::NAME);
    }
}