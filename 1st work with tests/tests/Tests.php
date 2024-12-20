<?php

namespace Tests;
use PHPUnit\Framework\TestCase;
use function caesarCipher;

class Tests extends TestCase
{
    public function testSimpleEncryption()
    {
        $this->assertEquals('cdefg', caesarCipher('abcde', 2));
        $this->assertEquals('xyz', caesarCipher('vwx', 2));
    }

    public function testUpperCaseEncryption()
    {
        $this->assertEquals('CDEFG', caesarCipher('ABCDE', 2));
        $this->assertEquals('XYA', caesarCipher('VWX', 2));
    }

    public function testMixedCaseEncryption()
    {
        $this->assertEquals('CgEfG', caesarCipher('AbCdE', 2));
    }

    public function testNonAlphabeticCharacters()
    {
        $this->assertEquals('123 !@#', caesarCipher('123 !@#', 2));
        $this->assertEquals('Hello, World!', caesarCipher('Hello, World!', 2));
    }

    public function testSpaces()
    {
        $this->assertEquals('C defg', caesarCipher('A bcd', 2));
    }

    public function testKeyVariations()
    {
        $this->assertEquals('defgh', caesarCipher('abcde', 3));
        $this->assertEquals('abcde', caesarCipher('abcde', 0));
        $this->assertEquals('cdefg', caesarCipher('abcdef', -1));
    }

    public function testEmptyString()
    {
        $this->assertEquals('', caesarCipher('', 2));
    }
}

