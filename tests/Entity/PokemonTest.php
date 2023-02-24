<?php

namespace App\Tests\Entity;

use App\Entity\Generation;
use App\Entity\Pokemon;
use App\Entity\Type;
use PHPUnit\Framework\TestCase;

class PokemonTest extends TestCase
{
    private CONST POKEMON_NAME = 'Bulbizarre';
    private CONST POKEDEX_NUMBER = 1;
    private CONST POKEMON_DESCRIPTION = 'Il a une étrange graine plantée sur son dos. Elle grandit avec lui depuis la naissance.';
    private CONST IMAGE_URL = 'https://www.pokebip.com/pokedex-images/artworks/1.png';
    private CONST SOUND_URL = 'https://pokemoncries.com/cries-old/1.mp3';
    private CONST GENERATION = 1;
    private CONST TYPE_ONE = 'Plante';
    private CONST TYPE_TWO = 'Poison';

    public function testInstance()
    {
        $pokemon = $this->getPokemon();
        $this->assertInstanceOf(Pokemon::class, $pokemon, 'The pokemon MUST be an instance of the class Pokemon');
    }

    public function testName()
    {
        $pokemon =  $this->getPokemon();
        $this->assertNotNull($pokemon->getName(), 'The name of the pokemon CANNOT be null');
        $this->assertIsString($pokemon->getName(), 'The name of the pokemon MUST be a string');
        $this->assertEquals(
            self::POKEMON_NAME, $pokemon->getName(),
            "The given name (".self::POKEMON_NAME.") is not the same when getting pokemon's name: ".$pokemon->getName()
        );
    }

    public function testPokedexNumber()
    {
        $pokemon = $this->getPokemon();
        $this->assertNotNull($pokemon->getPokedexNumber(), 'The pokedex number of the pokemon CANNOT be null');
        $this->assertIsInt($pokemon->getPokedexNumber(), 'The pokedex number MUST be an integer');
        $this->assertEquals(
            self::POKEDEX_NUMBER, $pokemon->getPokedexNumber(),
            "The given pokedex number (".self::POKEDEX_NUMBER.") is not the same when getting pokemon's pokedex number: ".$pokemon->getPokedexNumber()
        );
    }

    public function testDescription()
    {
        $pokemon = $this->getPokemon();
        $this->assertNotNull($pokemon->getDescription(), 'The description of the pokemon CANNOT be null');
        $this->assertIsString($pokemon->getDescription(), 'The description MUST be a string');
        $this->assertEquals(
            self::POKEMON_DESCRIPTION, $pokemon->getDescription(),
            "The given description (".self::POKEMON_DESCRIPTION.") is not the same when getting pokemon's description: ".$pokemon->getDescription()
        );
    }

    public function testImageUrl()
    {
        $pokemon = $this->getPokemon();
        $this->assertNotNull($pokemon->getImageUrl(), 'The image URL of the pokemon CANNOT be null');
        $this->assertIsString($pokemon->getImageUrl(), 'The image URL MUST be a string');
        $this->assertEquals(
            self::IMAGE_URL, $pokemon->getImageUrl(),
            "The given image URL (".self::IMAGE_URL.") is not the same when getting pokemon's image URL: ".$pokemon->getImageUrl()
        );
    }

    public function testSoundUrl()
    {
        $pokemon = $this->getPokemon();
        $this->assertNotNull($pokemon->getSoundUrl(), 'The sound URL of the pokemon CANNOT be null');
        $this->assertIsString($pokemon->getSoundUrl(), 'The sound URL MUST be a string');
        $this->assertEquals(
            self::SOUND_URL, $pokemon->getSoundUrl(),
            "The given sound URL (".self::SOUND_URL.") is not the same when getting pokemon's sound URL: ".$pokemon->getSoundUrl()
        );
    }

    public function testGeneration()
    {
        $generation = $this->createMock(Generation::class);
        $generation->method('getNumber')->willReturn(self::GENERATION);
        $pokemon = $this->getPokemon();
        $pokemon->setGeneration($generation);
        $this->assertEquals(
            self::GENERATION,
            $pokemon->getGeneration()->getNumber(),
            'Expected generation number and the received one are not the same. Expected: '.self::GENERATION.', received: '.$pokemon->getGeneration()->getNumber()
        );
    }

    public function testType()
    {
        $typeOne = $typeTwo = $this->createMock(Type::class);
        $typeOne->method('getName')->willReturn(self::TYPE_ONE);
        $typeTwo->method('getName')->willReturn(self::TYPE_TWO);
        $pokemon = $this->getPokemon();
        $pokemon->addType($typeOne);
        $pokemon->addType($typeTwo);

        $this->assertNotEmpty($pokemon->getTypes(), 'The pokemon MUST have at least one type.');
        $this->assertTrue(in_array($typeOne, $pokemon->getTypes()->toArray(), 'The first given Type is not in the pokemon\'s types.'));
        $this->assertTrue(in_array($typeTwo, $pokemon->getTypes()->toArray(), 'The second given Type is not in the pokemon\'s types.'));
    }

    private function getPokemon(): Pokemon
    {
        return new Pokemon(
            self::POKEMON_NAME,
            self::POKEDEX_NUMBER,
        self::POKEMON_DESCRIPTION,
            self::IMAGE_URL,
            self::SOUND_URL
        );
    }
}