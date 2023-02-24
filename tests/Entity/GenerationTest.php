<?php

namespace App\Tests\Entity;

use App\Entity\Generation;
use PHPUnit\Framework\TestCase;

class GenerationTest extends TestCase
{
    private CONST GENERATION_NUMBER = 1;

    public function testInstance()
    {
        $generation = $this->getGeneration();
        $this->assertInstanceOf(Generation::class, $generation, 'The generation MUST be an instance of Generation class.');
    }

    public function testNumber()
    {
        $generation = $this->getGeneration();
        $this->assertNotNull($generation->getNumber(), 'The number of generation CANNOT be null');
        $this->assertIsInt($generation->getNumber(), 'The number of generation MUST be an integer');
        $this->assertEquals(
            self::GENERATION_NUMBER ,
            $generation->getNumber(),
            'Expected generation number and received on are not the same. Expected: '.self::GENERATION_NUMBER.', received: '.$generation->getNumber());
    }

    private function getGeneration(): Generation
    {
        return new Generation(self::GENERATION_NUMBER);
    }
}